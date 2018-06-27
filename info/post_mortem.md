



# Document post-mortem

## Etat du projet à la livraison
### ce qui fonctionne
L'utilisateur peut s'inscrire, se connecter et se déconnecter.

L'utilisateur peut ajouter des amis, ceux-ci doivent confirmer ou refuser cette demande.

L'utilisateur peut accéder à tous les sondages qu'il a créé, à partir de sa page de profil.

Les utilisateurs peuvent, à partir du lien du sondage, y répondre.

Si autorisés, les utilisateurs peuvent accéder au récapitulatif des réponses d'un sondage, sinon, seul le créateur en est capable


### ce qui ne fonctionne pas
Lors de la création d'un sondage, on devrait pouvoir ajouter ou supprimer des modules.

Un module est un ensemble comprenant une question, des options, et eventuellement des réponses. 

Après l'élaboration du sondage, Le créateur devrait pouvoir envoyer un email à certain contacts de sa liste d'amis, en cochant une case par exemple.

Le créateur d'un sondage devrait pouvoir le supprimer ou le desactiver/cacher

L'administrateur du site devrait pouvoir supprimer des utilisateurs ou des sondages.
L'administrateur devrait pouvoir envoyer une newsletter / une note de version  par mail, aux utilisateurs enregistrés.

## Déroulement du projet
La communication a principalement été faite via Discord, une application regroupant un tchat écrit et vocal.

La communication durant le projet a été présente pour savoir qui travaillait sur quoi. Les réunions sur discord n'étaient pas forcément le mieux comparées à des réunions sur la fac.
Une version v0 a été définie mais par la suite, nous avons ajouté des fonctionnalitées sans trop chercher à compléter une version pré-définie.


## Axes d'amélioration
Il est possible de remplacer le php par du JavaScript pour la modernité.
Le profil peut permettre à l'utilisateur de retrouver tous les sondages auquel il a été invité.
On peut imaginer plusieurs options à rajouter aux sondage :
 - La possibilité d'ajouter dynamiquement des champs de réponse lors de la création
 - La possibilité de choisir un type DatePicker, permettant le choix entre plusieurs jours et horaires
 - Lors de l'affichage des resultats, proposer plusieurs types de graphiques représentatifs.
 
 
---

# Manuel de reprise de code

**Langages requis** : PHP, SQL, JavaScript, HTML, CSS.

## 1. Localisation et organisation des fichiers.
Les fichiers sont disponibles en ligne à l'adresse <https://github.com/SegolenePoisson/ProjetL3>.
## 2. Schéma des liens entre les pages :
![schema](https://github.com/SegolenePoisson/ProjetL3/blob/framework/info/img/liens_pages.jpg "")

## 3. Développement sur serveur local :
Différent logiciel sont utilisables pour créer le serveur local : Xampp, WamppServer, etc. 
Nous avons utilisés Xampp, il permet de lancer un serveur apache pour executer le php, ainsi qu'un serveur phpMyAdmin, utilisé pour la base de données.

Pour obtenir les tables de la base de données, sans valeurs, il faut executer db_setup.php après avoir au préalable créé une nouvelle base de donnée 'poll' dans phpmyadmin. (localhost/phpmyadmin)

Pour obtenir les tables avec un exemple de valeurs, dans phpmyadmin, utiliser la fonction 'import' et le fichier structure.sql.



