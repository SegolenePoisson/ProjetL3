# Document d'architecture
L'objectif était de créer un outil en ligne de génération de sondages personnalisés. Nous détaillerons ici nos choix techniques ainsi que l'organisation des différents fichiers du projet.
## 1. Choix techniques
Nous avons choisi de développer un outil en ligne pour qu'il soit accessible aisément, avec un mode de fonctionnement simple, en s'inspirant du site <https://www.strawpoll.me/>. L'idée est de pouvoir partager le sondage généré grâce au lien fourni, qui renvoie vers la page permettant d'y répondre.

Nous avons opté pour les langages suivants :  
- HTML et PHP pour les pages web ;  
- CSS et un framework via [Materialize](https://materializecss.com/) pour le rendu visuel ;  
- JavaScript pour modifier dynamiquement des éléments de la page ;  
- SQL pour assurer les liens avec la base de donnée.

Nous étions tous à peu près débutants dans ces langages, nous les avions donc choisis entre autres pour l'abondance de documentation et de cours à leur sujet, en particulier sur [Openclassroom](https://openclassrooms.com/). Ils sont couramment utilisés et nous donnent donc une bonne base pour la suite de notre apprentissage.
Nous pensions a priori que PHP et JavaScript avait des buts tout à fait différents, que le PHP concernait l'aspect serveur d'un site web alors que le JavaScript permettait essentiellement de faire évoluer une page web "en direct", sans avoir à la rafraîchir. Nous avons appris à mi-projet que JavaScript était bien plus complet, mais nos compétences dans ce langage ne permettaient pas une refonte du site.
## 2. Architecture du projet
La figure suivante détaille les liens entre les différents fichiers du site : les pages principales sont représentées par les encadrés bleus (nom de la page en haut), accompagnées des fichiers qui y sont inclus (cadre à l'intérieur de la page) et des fichiers qui sont appelés par la page concernée et/ou les pages qui y sont liées (en italique, action qui appelle la page, et nom de la page appelée en dessous). Les flèches peuvent être traduites par "permet d'accéder à...".

![Schéma des liens entre les pages](https://github.com/SegolenePoisson/ProjetL3/raw/framework/info/liens_pages.jpg "Schéma des liens entre les pages")
### 2.1. Système d'authentification

### 2.2. Création de sondages
Le système de création d'un sondage a été imaginé comme détaillé à la figure suivante. Le principe est de créer des sondages pouvant contenir différents modules, c'est-à-dire des questions ayant des modalités de réponse différentes. Il utilise JavaScript pour modifier le formulaire proposé à droite selon les options selectionnées au centre.

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
