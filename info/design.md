# Document d'architecture
L'objectif était de créer un outil en ligne de génération de sondages personnalisés. L'utilisateur fait ceci cela... à préciser

Nous détaillerons ici nos choix techniques, puis l'organisation des différents fichiers du projet et enfin la manière dont nous nous sommes organisés au sein du groupe.
## 1. Choix techniques
Nous avons choisi de développer un outil en ligne pour qu'il soit accessible aisément, avec un mode de fonctionnement simple, en s'inspirant du site <https://www.strawpoll.me/>. L'idée est de pouvoir partager le sondage généré grâce au lien fourni, qui renvoie vers la page permettant d'y répondre.

Nous avons opté pour les langages suivants :  
- HTML et PHP pour les pages web ;  
- CSS et un framework via [Materialize](https://materializecss.com/) pour le rendu visuel ;  
- JavaScript pour modifier dynamiquement des éléments de la page ;  
- SQL pour assurer les liens avec la base de donnée.

Nous étions tous à peu près débutants dans ces langages, nous les avions donc choisis entre autres pour l'abondance de documentation et de cours à leur sujet, en particulier sur [Openclassroom](https://openclassrooms.com/). Ils sont couramment utilisés et nous donnent donc une bonne base pour la suite de notre apprentissage.
Nous pensions a priori que PHP et JavaScript avait des buts tout à fait différents, que le PHP concernait l'aspect serveur d'un site web alors que le JavaScript permettait essentiellement de faire évoluer une page web "en direct", sans avoir à la rafraîchir. Nous avons appris à mi-projet que JavaScript était bien plus complet, mais nos compétences dans ce langage ne permettaient pas une refonte du site. Ici, JavaScript est utilisé uniquement côté client, à la création d'un compte et à la création d'un sondage. Sur la page d'inscription (création de compte), un script vérifie la validité du contenu des champs au remplissage (forme de l'adresse mail et confirmation du mot de passe). Sur la page de création de sondage, un script modifie le formulaire proposé selon l'option de réponse choisie. Vous trouverez plus de détails sur la structure de ces pages dans la section suivante.
## 2. Architecture du projet
La figure suivante détaille les liens entre les différents fichiers du site : les pages principales sont représentées par les encadrés bleus (nom de la page en haut), accompagnées des fichiers qui y sont inclus (cadre à l'intérieur de la page) et des fichiers qui sont appelés par la page concernée et/ou les pages qui y sont liées (en italique, action qui appelle la page, et nom de la page appelée en dessous). Les flèches peuvent être traduites par "permet d'accéder à...".

![Schéma des liens entre les pages](https://github.com/SegolenePoisson/ProjetL3/raw/master/info/img/liens_pages.jpg "Schéma des liens entre les pages")
### 2.1. Système d'authentification
Le système d'authentification est geré, côté utilisateur, par 2 pages : login.php et signup.php.
#### login.php
La page login.php propose une interface simple de connexion composée de deux champs textuels permettant de transmettre le nom d'utilisateur et le mot de passe au serveur. Suite à cela, le serveur verifie les données et redirige vers index.php.

![Diagramme de sequence de requete de connexion](https://github.com/SegolenePoisson/ProjetL3/raw/master/info/img/Diagramme_de_sequence_de_requete_de_connexion.png "Diagramme de sequence de requete de connexion")

#### signup.php
La page signup.php propose une interface composée 6 champs textuels permettant de vérifier et d'enregistrer les informations de l'utilisateur dans la base de données (nom, mail, pseudonyme et mot de passe).  
Un captcha empêche la création automatique et intempestive de comptes.  
La verification de la forme correcte de l'adresse mail et de l'egalité des deux mots de passes saisis est implementée en JavaScript.
Si le captcha est validé et que les informations sont correctes, l'utilisateur sera redirigé vers login.php.

![Diagramme de sequence de requete d'inscription](https://github.com/SegolenePoisson/ProjetL3/raw/master/info/img/Diagramme_de_sequence_de_requete_d'inscription.png "Diagramme de sequence de requete d'inscription")


### 2.2. Création de sondages
Le système de création d'un sondage a été imaginé comme détaillé à la figure suivante. Le principe est de créer des sondages pouvant contenir différents modules, c'est-à-dire des questions ayant des modalités de réponse différentes. Il utilise JavaScript pour modifier le formulaire proposé à droite selon les options selectionnées au centre.

![Structure de la page de création d'un sondage](https://github.com/SegolenePoisson/ProjetL3/raw/master/info/img/poll_modulaire.jpg "Structure de la page de création d'un sondage")
### 2.3. Réponse à un sondage et résultats

## 3. Organisation du groupe
Nous utilisions une application de chat vocal pour nous tenir au courrant et faire des points d'avancement : [Discord](https://discordapp.com/).  
Pour avoir une liste des tâches à effectuer et les assigner, nous utilisions Trello : [notre Trello](https://trello.com/b/PUTqpnMR/woui).  
Et Github pour mettre le code en commun et gérer les versions : [notre projet Github](https://github.com/SegolenePoisson/ProjetL3/).

La répartition des tâches a été faite comme suit :

Participant | Tâche
:---: | ---
Valentin Petit |  
Romain Olivo | 
Luc Powell | 
Kévin Chertier | 
Antoine Mousserion | 
Ségolène Poisson | JavaScript ; Script pour la vérification des informations à l'inscription, script pour l'apparition dynamique du formulaire à la création d'un sondage

>- Principe de mise en œuvre de la solution (comment)
>- Règles d'architecture
>- Modèle statique : organisation des packages, descriptions des classes principales et de leurs responsabilités (si cela a du sens dans votre projet)
>- Modèle dynamique : flux des événements, nominal et sur erreur, démarrage et arrêt (si cela a du sens dans votre projet)
>- Explication de la prise en compte des contraintes d'analyse (Si une exigence d'analyse a eu un impact sur le design, genre projet multo-plateforme)
>- Cadre de production : outils de dev, de configuration et de livraison.

>A ajouter aussi : diagramme de séquences
