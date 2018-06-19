# ProjetL3

L'objectif est de créer un outil en ligne de génération de sondages à petite échelle.
L'utilisateur s'inscrit, créé un sondage personnalisé, par exemple :

"Quel nom serait le plus approprié pour ce projet ?
	- Woui, ça sonne bien.
	- Strawpoll, classique.
	- A-poll, ça sonne bien aussi."

Une page spécifique est générée, l'utilisateur partage le lien aux personnes qui y participent. Les sondés peuvent ajouter des propositions avant de voter (jusqu'à un certain nombre choisi par le créateur du sondage, par exemple). Le sondage reste ouvert jusqu'à ce que son créateur le ferme ou jusqu'à une durée prédéfinie.

Le système de vote fera l'objet de plusieurs amélioration/versions. On pourrait par exemple proposer aux sondés de faire plusieurs choix classés par préférence pour que le résultat du sondage soit au plus proche de l'opinion générale du groupe.

----

v0 - 24/05/2018 : système d'inscription, d'authentification, création d'un sondage dans la bdd, création de sa page associée.

v1 - 19/06/2018 : création d'un sondage à plusieurs modules, chaque module étant une question différente d'un même sondage, avec plusieurs options de réponse (réponse simple, ouverte, à choix multiple ou date) ; gestion de la liste d'amis, ajout avec confirmation.
