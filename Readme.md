# Architecture MVC

|Mise en place du workspace|
|:-|
<pre>
project folder
⌊ app
    ⌊ Middleware
        Authentification.php
    ⌊ Helper
        Router.php
        ExceptionHandler.php
    ⌊ Controller
        Controller.php
        AdminController.php
        FrontController.php
        NomController.php
    ⌊ Model
        Model.php
        NomModel.php
    ⌊ less
⌊ vendor
    ⌊ composer
    ⌊ mustache
    autoload.php
⌊ webroot
    ⌊ style
        ⌊ admin
            style.css
        style.bo.css
    ⌊ script
        ⌊ admin
            script.js
        script.bo.js
    ⌊ View
        ⌊ layout
        ⌊ admin
    ⌊ media
    index.php
</pre>

## Petit tour d'horizon

Dans notre framework, l'index sera la seule et unique porte d'entrée de l'application.

C'est dans notre index que le routeur se chargera de récupérer l'url et de nous rediriger vers le contrôleur/méthode correspondant.

Un middleware s'occupera de vérifier les droits utilisateurs pour chaque accès dans la partie administration du site.
Le contrôleur se charge de tous les traitements. avec ou sans données récupérées depuis les modèles.

Chaque contrôleur envoie ses données traitées à une ou plusieurs vues pour afficher une page à l'utilisateur.

### Contrôleurs

* Gérer le traitement des données;
* Faire le lien entre les modèles et les vues.

### Modèles

* Données;
* Logique des données.

### Vues

* Interface graphique;
* Visible par l'utilisateur.

### Helpers

### Middlewares

* Fournir un service.

## LIBRAIRIES EXTERNES

||Nom|Notes|
|:-|-:|-:|
|ORM|Propel|PHP > 5.4|
|TEMPLATE ENGINE|Mustache|
|PRE-PROCESSOR|LESS|

## BASE DE DONNEES

|users||
|:-|-:|
|id|INT|
|name|VARCHAR(250)|
|email|VARCHAR(250)|
|password|VARCHAR(250)|
|isAdmin|INT|

## FEUILLE DE ROUTE

* Gérer le routage;
* Créer la BDD;
* Mise en place de l'ORM;
* Mise en place du templating;
* Mise en place du pré-processeur;
* Authentification.

## EVOLUTIONS

* Ajout d'une table _roles_ avec _id_ et _title_, suppression du flag _isAdmin_ dans la table _users_ et stockage du l'_idRole_;
* Gestion des paramètres passés dans l'url dans le **RouteHandler**.

## NB

Propel insert command :

```
vendor/bin/propel sql:insert --connection app=mysql:host=localhost\;dbname=app\;user=root\;password=0000\;
```




