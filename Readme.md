# Validation POO DSF13A - Czaja Kevin

## Routage

Le routage est organisé comme tel:

https://localhost/controller/methode

Si aucune méthode n'est renseigné, on tape automatiquement sur la méthode index du controller;
Si aucun controller n'est renseigné, on tape automatiquement sur le controller HomeController et donc par extension la méthode index.

## Controllers

Un Controller principal, un controller qui gère le front, un qui gère l'administration et des controllers enfants pour gérer les vues en particulier.

## Vues

Les vues sont gérées avec Mustache php https://github.com/bobthecow/mustache.php

Vues pour le front dans /view/
Vues pour l'admin dans /view/admin
Tous les partials sont appelés depuis /view/partial

Il est possible de modifier les dossiers a l'instanciation de la classe Mustache dans les Controllers

## Models

Un Model parent et ses enfants. Dans ce cas, un seul enfant, Section.

Requetes SELECT et UPDATE.

SELECT
getAll récupère toutes les lignes d'une table. Par défaut, récupère toutes les colonnes. Possibilité de lui passer un tableau avec les colonnes que l'on veut récupérer et de faire un order by en lui passant la colonne en deuxième paramètre.

UPDATE
Pour l'update en particulier, on passe un array avec toutes les variables à modifier.

## Home Page

Affichage de toutes les sections dans l'ordre d'affichage défini coté administration.

## Administration

Edition des sections. Lorsqu'on update pour mettre un ordre qui existe déjà dans une autre section, on swap les deux ordres automatiquement. C'est un peu déguelasse pour le moment mais je n'ai pas le temps de pousser plus loin. C'est un début de piste. (Il faudrait limiter l'ordre max au nombre de sections déjà avec un select à la place de l'input et un count sur le nombre d'éléments renvoyés dans la liste des sections à la construction de la page).

ATTENTION : Ne pas mettre deux memes ordres d'affichage directement depuis la BDD. Mais qui fait ca de toute maniere !