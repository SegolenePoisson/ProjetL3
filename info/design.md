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
![Schéma des liens entre les pages](https://github.com/SegolenePoisson/ProjetL3/raw/framework/info/liens_pages.jpg "Schéma des liens entre les pages")
### 2.1. Système d'authentification

### 2.2. Création de sondages
![Structure de la page de création d'un sondage](https://github.com/SegolenePoisson/ProjetL3/raw/framework/info/poll_modulaire.jpg "Structure de la page de création d'un sondage")
### 2.3. Réponse à un sondage et résultats

## 3. Organisation du groupe
Nous utilisions une application de chat vocal pour nous tenir au courrant et faire des points d'avancement : [Discord](https://discordapp.com/).  
Pour avoir une liste des tâches à effectuer et les assigner, nous utilisions [Trello](https://trello.com/b/PUTqpnMR/woui).  
Et pour mettre le code en commun et gérer les versions, [Github](https://github.com/SegolenePoisson/ProjetL3/).

>- Principe de mise en œuvre de la solution (comment)
>- Règles d'architecture
>- Modèle statique : organisation des packages, descriptions des classes principales et de leurs responsabilités (si cela a du sens dans votre projet)
>- Modèle dynamique : flux des événements, nominal et sur erreur, démarrage et arrêt (si cela a du sens dans votre projet)
>- Explication de la prise en compte des contraintes d'analyse (Si une exigence d'analyse a eu un impact sur le design, genre projet multo-plateforme)
>- Cadre de production : outils de dev, de configuration et de livraison.

>A ajouter aussi : diagramme de séquences, schéma liens entre les pages, plan page création de poll
