# pizza-website-php

Reprendre le site statique de pizzeria et le rendre dynamique avec des concepts de PHP procédural (inclusions de pages).

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
    │   │   ├── check_email_exists.php
    │   │   ├── confirm_cart.php
    │   │   ├── login.php
    │   │   ├── remove_cart.php
    │   │   ├── send_contact_mail.php
    │   │   ├── send_reset_link_password.php
    │   │   ├── update_password.php
    │   │   └── update_status_order.php
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
    │       │   ├── form_forgot_password.php
    │       │   ├── form_login.php
    │       │   ├── form_reset_password.php
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
    ├── forgot_password.php
    ├── index.php
    ├── login.php
    ├── maintenance.php
    ├── profile.php
    ├── reset_password.php
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
- checkout.php : Page de validation du panier
- confirmation.php : Page de confirmation une fois le panier validé 
- forgot_password.php : Page de saisie lors de l'oubli du mot
- index.php : Page d'acceuil
- login.php : Page de connexion
- maintenance.php : Page de maintenance
- profile.php : Page de profil et de commande réservé aux utilisateurs authentifiés
- reset_password: Page de saisie du nouveau mot de passe.
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
###### IF
``` 
<?php 
    if ($currentPage === 'contact') { ?> 
        class="active"
<?php } ?>>La carte</a></li>
```

###### IF ELSE
```
<?php 
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    unset($_SESSION['cart_item'][$_GET['product_id']]);
} else {
    unset($_SESSION['cart_item']);
}
```
###### SWITCH
```
switch ($_POST['status']) {
    case PAYMENT_STATUS_CANCELLED:
        setFlash('status_order', 'La commande a bien été annulée', 'alert-success');
        break;
    case PAYMENT_STATUS_PAID:
        setFlash('status_order', 'La commande a bien été payé', 'alert-success');
        break;
}
```
__Documentation__:

* [Structure de controle if](https://www.php.net/manual/fr/control-structures.if.php)
* [Structure de controle else](https://www.php.net/manual/fr/control-structures.else.php)
* [Structures de contôle switch](https://www.php.net/manual/fr/control-structures.switch.php)

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
* [Fonction interne](https://www.php.net/manual/fr/functions.internal.php)

#### 6. PDO

#### 6.1 Connexions

```
    $connexion = new PDO(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD]);
```
__Documentation__:

* [Connexions et gestionnaire de connexion](https://www.php.net/manual/fr/pdo.connections.php)
* [Objet PDO qui représente une connexion à la base](https://www.php.net/manual/fr/pdo.construct.php)
* [Classe représentant une connexion PHP à un serveur de base de données](https://www.php.net/manual/fr/class.pdo.php)

#### 6.2 PDO et PDOStatement

``` 
function getOrderItems(int $id)
{
    global $connexion;

    $sql = "SELECT o.id, o.ordered_at, pt.type, p.name, p.price, ot.quantity, (p.price * ot.quantity) as total 
    FROM `order` o
    INNER JOIN order_item ot ON ot.order_id = o.id 
    INNER JOIN product p ON p.id = ot.product_id
    INNER JOIN product_type pt ON pt.id = p.product_type_id
    WHERE o.id = :order_id";

    $statement = $connexion->prepare($sql);
    $statement->bindParam(':order_id', $id);
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    $statement->execute();

    return $statement->fetchAll();
}
```
__Documentation__:

* [Prépare une requête à l'exécution et retourne un objet](https://www.php.net/manual/fr/pdo.prepare)
* [Classe représentant une requête préparée](https://www.php.net/manual/en/class.pdostatement.php)
* [Lie un paramètre à un nom de variable spécifique](https://www.php.net/manual/fr/pdostatement.bindparam.php)
* [Exécute une requête préparée](https://www.php.net/manual/fr/pdostatement.execute.php)
* [Retourne un tableau contenant toutes les lignes](https://www.php.net/manual/fr/pdostatement.fetchall.php)
* [Mode de récupération pour les requêtes](https://www.php.net/manual/en/pdostatement.setfetchmode.php)
* [Constantes PDO](https://www.php.net/manual/fr/pdo.constants.php)


#### 7. Les exceptions

```
    try {
        $connexion = new PDO(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD);
        // Configure un attribut de base de données => PDO::ERRMODE_EXCEPTION : 
        // émet une exception.
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $exception) {
        $message = $exception->getMessage();
        sendNotification('Connexion Error', $message);
        header('Location:maintenance.php');
    }
``` 

__Documentation__:

* [Les exceptions](https://www.php.net/manual/fr/language.exceptions.php)

 
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

* [$_GET — Variables HTTP GET](https://www.php.net/manual/fr/reserved.variables.get.php)


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


#### 11. Manipuler des tableaux

* [Les tableaux](https://www.php.net/manual/fr/language.types.array.php)
* [Les fonction array](https://www.php.net/manual/fr/function.array.php)

```
    if (!isset($_SESSION['auth']['logged'])) {
        $data = array_merge($_POST, $_SESSION);
        $data['password'] = hashPassword($data['password']);
        $userId = createUser($data);
    } else {
        $user = getUserBy('email', $_POST['email']);
        $data = array_merge($user, $_SESSION);
        $userId = $user['id'];
    }
```

__Documentation__:
* $_POST : Un tableau associatif des valeurs passées au script courant via le protocole HTTP 
* $_SESSION : Un tableau associatif des valeurs stockées dans les sessions.
* [Fusionner des tableaux](https://www.php.net/manual/fr/function.array-merge)

```
function computeTotalOrder(array $cartItem) : float 
{
    return array_sum(array_column($cartItem, 'total'));
}
```
__Documentation__:
* [Calcule la somme des valeurs des tableaux](https://www.php.net/manual/fr/function.array-sum.php)
* [Retourne les valeurs d'une colonne d'un tableau d'entrée](https://www.php.net/manual/fr/function.array-column.php)

```
    $statOrder['total'] = count($orders);
    $statOrder['status'] = array_count_values(array_column($orders, 'status'));   
```

__Documentation__:
* [Compte le nombre de valeur d'un tableau](https://www.php.net/manual/fr/function.array-count-values.php)
* [Compte tous les éléments d'un tableau ou quelque chose d'un objet](https://www.php.net/manual/fr/function.count.php)

#### 12. Manipuler des dates

```
$orderedAt = (new DateTime())->format('Y-m-d H:i:s');
```
__Documentation__:

* [La classe DateTime](https://www.php.net/manual/fr/class.datetime)
* [Format](https://www.php.net/manual/fr/datetime.formats.date.php)

```
<p class="copyright">© Pizza Billy - Pizzeria <?= date('Y'); ?></p>
``` 
__Documentation__:

* [date](https://www.php.net/manual/fr/function.date)

#### 13. Bufferisation

```
<?php 
    ob_start();
?>
```
```
<?php
    $scriptJavascript = ob_get_contents();
    ob_end_clean();
?>
```

__Documentation__:

* [Fonction de bufferisation de sortie](https://www.php.net/manual/fr/ref.outcontrol.php)

__Documentation__:
* [Enclenche la temporisation de sortie](https://www.php.net/manual/fr/function.ob-start.php)
* [Retourne le contenu du tampon de sortie](https://www.php.net/manual/fr/function.ob-get-contents.php)
* [Détruit les données du tampon et eteint la temporisation de sortie](https://www.php.net/manual/fr/function.ob-end-clean.php)

#### 14. Les cookies

#### 15. Les sessions
```
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
```

```
$_SESSION['cart_item'][$product['id']]['quantity'] = (int)$_POST['quantity'];
$_SESSION['cart_item'][$product['id']]['name'] = $product['name'];
$_SESSION['cart_item'][$product['id']]['product_type_id'] = $product['product_type_id'];;
$_SESSION['cart_item'][$product['id']]['price'] = (int)$product['price'];
```
#### 16. Gestions des mot de passe

```
function hashPassword(string $password) : string
{
    return password_hash($password, PASSWORD_DEFAULT);
}
```

```
if (password_verify($password, $user['password'])) {
    $_SESSION['auth']['logged'] = true;
    $_SESSION['auth']['user'] = $user;

    return true;
}
``` 
__Documentation__:

* [Crée une clé de hachage pour un mot de passe](https://www.php.net/manual/fr/function.password-verify)
* [Vérifie qu'un mot de passe correspond à un hachage](https://www.php.net/manual/fr/function.password-hash.php)

#### 17. PHP AJAX

``` 
<script>
    function checkEmail(data)
    {
        if (data.length !== 0) {
            const xmlHttp = new XMLHttpRequest();
            
            xmlHttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    const result = JSON.parse(this.responseText);
                    if (result.exists) {
                        document.getElementById('email').style.border = '2px solid red';
                        document.getElementById('checkout').disabled = true;
                        document.querySelector('p.caption').innerText = 'Email deja existant';
                    } else {
                        document.getElementById('email').style.border = '2px solid green';
                        document.getElementById('checkout').removeAttribute("disabled");
                        document.querySelector('p.caption').innerText = '';
                    }
                }
            }
            xmlHttp.open('GET', 'src/action/check_email_exists.php?email=' + data, true);
            xmlHttp.send();
        }
    }
</script>
``` 

```
if (!empty($userEmail)) {
    $isExists = ['exists' => true, 'email' => $email];
}

echo json_encode($isExists);
```
__Documentation__:

* [XMLHttpRequest] (https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest)
* [Exemple W3C](https://www.w3schools.com/php/php_ajax_php.asp)


#### 18. Sucre syntaxique

* La syntaxe Heredoc PHP est un moyen d'écrire de gros blocs de texte à l'intérieur de PHP, sans les délimiteurs classiques entre guillemets simples et doubles. 
Il s'appuie sur <<< et un jeton qui marquera également la fin de la chaîne.

```
    $header = <<<EOT
            <html>
            <body>
            <h1>Commande numéro {$customerData['order_id']} de {$customerData['fullname']}</h1>
            <dl>
                <dt style="float:left;font-size:24px">Email</dt>
                <dd style="font-size:24px">{$customerData['email']}</dd>
                <dt style="float:left;font-size:24px">Téléphone</dt>
                <dd style="font-size:24px">{$customerData['phone']}</dd>
                <dt style="float:left;font-size:24px">Adresse</dt>
                <dd style="font-size:24px">{$customerData['address']}</dd>
            <dl>
            <h2>Détail de la commande</h2>
            <table style="border:1px solid black;border-collapse:collapse;border-spacing:20px">
                <tr>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Type de produit</th>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Produit</th>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Quantité</th>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Price</th>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Total</th>
                </tr>
            <tbody>
            EOT;
```
__Documentation__:

* [heredoc](https://www.php.net/manual/fr/language.types.string.php#language.types.string.syntax.heredoc)

* L'opérateur Null coalescent (??) a été ajouté comme un sucre syntaxique pour les cas de besoin le plus commun d'utiliser une troisième conjonction avec la fonction isset(). Il retourne le premier opérande s'il existe et n'a pas une valeur null; et retourne le second opérande sinon.

```
$orderId = $_GET['order_id'] ?? $_GET['order_id']; 
```

__Documentation__:

* [Opérateur null coalescing](https://www.php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-op)

19. Sécurité

[Injection SQL](https://fr.wikipedia.org/wiki/Injection_SQL)
[CSRF](https://fr.wikipedia.org/wiki/Cross-site_request_forgery)
[XSS](https://fr.wikipedia.org/wiki/Cross-site_scripting)

