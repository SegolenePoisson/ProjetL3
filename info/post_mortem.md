# Document post-mortem

## Evolution du projet
-modes de communication, réunions, versions ?
La communication durant le projet a été présente pour savoir qui travaillait sur quoi. Les réunions sur discord n'étaient pas forcément le mieux comparées à des réunions sur la fac.
Une version v0 a été définie mais par la suite, nous avons ajouté des fonctionnalitées sans trop chercher à compléter une version pré-définie.

## Etat du projet à la livraison
ce qui fonctionne, ce qui ne fonctionne pas

## Axes d'amélioration
-remplacer php par js pour la modernité
-liste d'amis : accepter une demande ajoute l'ami qui l'a envoyée (actuellement à sens unique)

---

# Manuel de reprise de code

**Langages requis** : PHP, SQL, HTML, CSS, JavaScript.

## 1. Localisation et organisation des fichiers.
Les fichiers sont disponibles en ligne à l'adresse <https://github.com/SegolenePoisson/ProjetL3>.
Schéma des liens entre les pages.

#Développement sur serveur local : différent logiciel utilisables pour le serveur : Xampp, WamppServer (ne pas avoir les deux, possibilités de conflits)
Pour obtenir les tables de la base de données, executer db_setup.php après avoir au préalable créé une nouvelle base de donnée 'poll' dans phpmyadmin, ou dans phpmyadmin, utiliser la fonction import et le fichier structure.sql, qui permet d'avoir un exemple de sondage.
