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
    ├── src/
    │   ├── includes/
    │   │   ├── section/
    │   │   │   ├── form_contact.php
    │   │   │   ├── map.php
    │   │   │   ├── product.php
    │   │   │   ├── product_type.php
    │   │   │   └── service.html
    │   │   └── shared/
    │   │       ├── button_whatsapp.php
    │   │       ├── footer.php
    │   │       ├── head.php
    │   │       └── menu.php
    │   └── scripts/
    │       ├── function.php
    │       ├── database.php
    │       └── send_email.php
    ├── sql/
    │   └── db.sql
    ├── bootstrap.php
    ├── carte.php
    └── index.php
    
``` 

## 2. Description 

- [assets] : Ressources Web statiques comme les fichiers CSS, JavaScript et image

- [config] : Fichiers utiles à la configuration du projet

- [src/includes] : Les portions de pages séparé en 2 catégories.
    - [shared] Commune à toute les pages
    - [section] Portions de page plus spécifique

- [src/scripts] :  Traitement métiers appélé par les portions de page

- [sql] : Base de données SQL

- boostrap.php : Fichier de chargement de toutes les dépendances nécéssaires à l'éxécution du site.

- carte.php : Page affichant la liste des produits et type de produits

- index.php : Page d'acceuil
- maintenance.php : Page de maintenance

# Notions abordés

#### Inclure des portions de page
  * Une page PHP peut inclure une autre page ou un morceau de page grâce à l'instruction include qui sera remplacée par le contenu de la page demandée. 
  Cette technique permet de placer une portion du site dans un fichier (Ex: shared/header.php)  que l'on inclura dans toutes les pages. Cela permet de centraliser le code du header et permettra aussi une maintenance plus efficace. 
Documentation : https://www.php.net/manual/fr/function.include.php
