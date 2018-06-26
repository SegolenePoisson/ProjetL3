# Document d'architecture
L'objectif était de créer un outil en ligne de génération de sondages personnalisés. Nous détaillons ici nos choix techniques ainsi que l'organisation des différents fichiers du projet.
## 1. Choix techniques
Nous avons choisi de développer un outil en ligne pour qu'il soit accessible aisément, avec un mode de fonctionnement simple, en s'inspirant du site <https://www.strawpoll.me/>. L'idée est de pouvoir partager le sondage généré grâce au lien fourni, qui renvoie vers la page permettant d'y répondre.

Nous avons opté pour les langages suivants :  
- HTML et PHP pour les pages web ;  
- CSS et un framework via [Materialize](https://materializecss.com/) pour le rendu visuel ;  
- JavaScript pour modifier dynamiquement des éléments de la page ;  
- SQL pour assurer les liens avec la base de donnée.

Nous étions tous à peu près débutants dans ces langages, nous les avions donc choisis entre autres pour l'abondance de documentation et de cours à leur sujet, en particulier sur [Openclassroom](https://openclassrooms.com/).
## 2. Architecture du projet
(schéma liens entre les pages)

>- Principe de mise en œuvre de la solution (comment)
>- Règles d'architecture
>- Modèle statique : organisation des packages, descriptions des classes principales et de leurs responsabilités (si cela a du sens dans votre projet)
>- Modèle dynamique : flux des événements, nominal et sur erreur, démarrage et arrêt (si cela a du sens dans votre projet)
>- Explication de la prise en compte des contraintes d'analyse (Si une exigence d'analyse a eu un impact sur le design, genre projet multo-plateforme)
>- Cadre de production : outils de dev, de configuration et de livraison.

>A ajouter aussi : diagramme de séquences, schéma liens entre les pages, plan page création de poll
