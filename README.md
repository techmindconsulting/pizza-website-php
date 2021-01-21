# pizza-website-php

Reprendre le site statique de pizzeria et le rendre dynamique avec des concepts de PHP procédural et des inclusions de pages.

## 1. Arboresence

```
.
└── pizza-website-php/
    ├── assets/
    │   ├── css
    │   ├── doc
    │   ├── images
    │   └── pdf
    ├── config/
    │   └── parameters.php
    ├── data/
    │   └── db.sql
    ├── src/
    │   ├── action/
    │   │   ├── add_cart.php
    │   │   ├── update_status_order.php
    │   │   ├── check_email_exists.php
    │   │   ├── confirm_cart.php
    │   │   ├── login.php
    │   │   ├── remove_cart.php
    │   │   └── send_contact_mail.php
    │   ├── model/
    │   │   ├── order.php
    │   │   ├── product.php
    │   │   ├── user.php
    │   │   └── database.php
    │   ├── service/
    │   │   ├── auth.php
    │   │   ├── cart.php
    │   │   ├── csrf.php
    │   │   ├── debug.php
    │   │   ├── flashMessage.php
    │   │   ├── mailer.php
    │   │   ├── order.php
    │   │   └── validation.php
    │   └── template/
    │       ├── section/
    │       │   ├── account.php
    │       │   ├── cart_item.php
    │       │   ├── form_checkout.php
    │       │   ├── form_contact.php
    │       │   ├── form_login.php
    │       │   ├── map.php
    │       │   ├── product_type.php
    │       │   ├── product.php
    │       │   ├── service.html
    │       │   └── table_orders.php
    │       └── shared/
    │           ├── banner.php
    │           ├── button_cart.php
    │           ├── button_shopping_cart.php
    │           ├── button_whatsapp.php
    │           ├── footer.php
    │           ├── head.php
    │           └── menu.php
    ├── bootstrap.php
    ├── carte.php
    ├── checkout.php
    ├── confirmation.php
    ├── index.php
    ├── login.php
    ├── maintenance.php
    ├── profile.php
    └── shopping_cart.php
    
``` 

## 2. Description 

- [assets] : Ressources web statiques comme les fichiers CSS, javaScript et images

- [config] : Fichiers utiles à la configuration du projet

- [src/includes] : Les portions de pages séparé en 2 catégories.
    - [shared] Commune à toute les pages
    - [section] Portions de page plus spécifique

- [src] : Traitement métiers appélé par les actions et portions de page
    - [action] : fonction d'action utilisateurs (formulaires)
    - [model] : fonction communiquant avec la base de donnnée
    - [service] : fonction de traitement spécifique
    - [template] : sous gabarits de page inclus depuis les pages

- [data] : Base de données SQL

- boostrap.php : Fichier de chargement de toutes les dépendances nécéssaires à l'éxécution du site.
- carte.php : Page affichant la liste des produits et type de produits
- checkout.php : Validation du panier
- confirmation.php : Page de confirmation une fois le panier validé 
- index.php : Page d'acceuil
- login.php : Page de connexion
- maintenance.php : Page de maintenance
- profile.php : Page de profil et de commande réservé aux utilisateurs authentifiés
- shopping_cart.php : Page d'affichage du panier

## 3. Notions abordées

#### 1. Inclure des portions de page
  * Une page PHP peut inclure une autre page ou un morceau de page grâce à l'instruction include qui sera remplacée par le contenu de la page demandée. 
  Cette technique permet de placer une portion du site dans un fichier (Ex: shared/header.php)  que l'on inclura dans toutes les pages. Cela permet de centraliser le code du header et permettra aussi une maintenance plus efficace. 
  
  ```
     <head>
        <?php include 'src/includes/shared/head.php'; ?>
    </head>
  ```
  
 __Documentation__ : 
 
  * [include](https://www.php.net/manual/fr/function.include.php)
  * [require](https://www.php.net/manual/fr/function.require.php)

#### 2. Constantes
  * Faire appel à un fichier de configuration pour des paramètres qui changent peu ou pas (Ex: Accès à la base de données)
  Il est donc possible de stocker ces données dans des constantes.  
  La portée d'une constante est globale. Les constantes peuvent être accédé depuis partout dans un script sans tenir compte de la portée. 
  
  ``` 
    define("DATABASE_USER", "root");
    define("DATABASE_PASSWORD", "");
    define("DATABASE_URL","mysql:host=127.0.0.1:3306;dbname=pizza_website");
  ``` 
  
  ``` 
    $connexion = new PDO(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD, 
    [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
  ``` 
  
__Documentation__ : 

* [define — Définit une constante](https://www.php.net/manual/fr/function.define.php)
* [Les constantes](https://www.php.net/manual/fr/language.constants.php)

#### 3. Variables et portées
- La portee d'une variable dépend du contexte dans lequel la variable est définie.
La variable définie dans une fonction est locale à la fonction.
Les variables ci dessus sont locales: 
   * $fullname 
   * $message 
   * $header

``` 
function sendEmail(string $firstname, string $lastname, string $email, string $phone, string $message) : bool
{
    include '../../config/parameters.php';
    $fullname = $firstname. ' '. $lastname;
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);

    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:'.$fullname.'<'.$email.'>' . "\n";
    $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';
  
    if (mail(CONTACT_EMAIL, "Contact - pizzabilly.com", $message, $header)) {
        return true;
    } else {
        return false;
    }
}
``` 

- Toute variable définie en dehors d’une fonction a une portée globale. 
Une variable qui a une portée globale est accessible « globalement », 
c’est-à-dire dans tout le script sauf dans les espaces locaux d’un script.

Les variables ci dessus sont globales: 
   * $message
   * $connexion 

 ```
$connexion = null;
$message = '';

if (MAINTENANCE_MODE) {
    header('Location:maintenance.php');
}

try {
    $connexion = new PDO(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD, 
    [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
 ``` 

- En PHP, une variable globale doit être déclarée à l'intérieur de chaque fonction afin de pouvoir être utilisée dans cette fonction.

```
function getProductTypes() : array
{
    global $connexion;

    $statement = $connexion->prepare('SELECT * FROM product_type');
 ```
 
__Documentation__:

* [Portée des variables](https://www.php.net/manual/fr/language.variables.scope.php)
* [$GLOBALS — Référence toutes les variables disponibles dans un contexte global](https://www.php.net/manual/fr/reserved.variables.globals.php)

#### 4. Les boucles et conditions

##### 4.1 Boucle Foreach
``` 
<?php 
        $productTypes = getProductTypes();
        foreach($productTypes as $productType) {
            $linkProductType = 'carte.php?product-type-id='. $productType['id']; ?>
            <li><a class="black-button <?php if ($_GET['product-type-id'] === $productType['id']) echo 'active'; ?>" href="<?= $linkProductType ?>"><?= $productType['type'] ?></a></li>
<?php   } ?>
``` 

__Documentation__:

* [Boucle foreach](https://www.php.net/manual/fr/control-structures.foreach.php)


##### 4.2 Conditions

``` 
<?php 
    if ($currentPage === 'contact') { ?> 
        class="active"
<?php } ?>>La carte</a></li>
```
__Documentation__:

* [Structures de controles if](https://www.php.net/manual/fr/control-structures.if.php)
* [Structures de controles else](https://www.php.net/manual/fr/control-structures.else.php)

#### 5. Les fonctions

``` 
function isValidForm(array $postDatas) : bool
{
    if (empty($postDatas)) {
        return false;
    }

    foreach ($postDatas as $key => $value) {
        if (empty($value)) {
            return false;
        }
    }

    return true;
}
```

```
$isValid =  isValidForm($_POST);
```

__Documentation__:

* [Les fonctions définies par l'utilisateur](https://www.php.net/manual/fr/functions.user-defined.php)
* [Les arguments de fonction](https://www.php.net/manual/fr/functions.arguments.php)
* [Les valeurs de retour](https://www.php.net/manual/fr/functions.returning-values.php)
* [https://www.php.net/manual/fr/functions.internal.php](https://www.php.net/manual/fr/functions.internal.php)

#### 6. Connexion à la base de donnée: PDO class et SQL

```
    $connexion = new PDO(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD]);
```

``` 
function getProductTypes() : array
{
    global $connexion;

    $statement = $connexion->prepare('SELECT * FROM product_type');
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
    return $statement->fetchAll();
}
```

__Documentation__:

* [Connexions et gestionnaire de connexion](https://www.php.net/manual/fr/pdo.connections.php)
* [PDO::prepare — Prépare une requête à l'exécution et retourne un objet](https://www.php.net/manual/fr/pdo.prepare.php)

#### 7. Les exceptions

```
try {
    $connexion = new PDO(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD, 
    [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
    
    // Configure un attribut de base de données => PDO::ERRMODE_EXCEPTION : émet une exception.
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $exception) {
    $message = $exception->getMessage();
    header('Location:maintenance.php');
}
``` 

__Documentation__:

[Les exceptions](https://www.php.net/manual/fr/language.exceptions.php)

 
#### 8. Gestion des données de page en page: GET

```
<?php 
  $linkProductType = 'carte.php?product-type-id='. $productType['id'];
?>
```

```
<p><?= getProductTypeDescription($_GET['product-type-id']); ?></p>
```

__Documentation__:

[$_GET — Variables HTTP GET](https://www.php.net/manual/fr/reserved.variables.get.php)


#### 9. Gérer un formulaire : POST

```
  <form name="contact-form" method="POST" action="src/scripts/send_email.php">
```

```
$isValid =  isValidForm($_POST);

if ($isValid) {
``` 

``` 
function isValidForm(array $postDatas) : bool
{
    if (empty($postDatas)) {
        return false;
    }

    foreach ($postDatas as $key => $value) {
        if (empty($value)) {
            return false;
        }
    }

    return true;
}
``` 

__Documentation__:

* [$_POST — Variables HTTP POST](https://www.php.net/manual/fr/reserved.variables.post.php)


#### 10. Les filtres

``` 
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
} else {
        return false;
}
``` 

__Documentation__:

* [filter_var — Filtre une variable avec un filtre spécifique](https://www.php.net/manual/fr/function.filter-var.php)
* [En savoir plus sur les filtres](https://www.php.net/manual/fr/book.filter.php)



