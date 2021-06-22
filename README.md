# siteMissionSocieteSecurite

Site réalisé dans le cadre d'une évaluation d'entraînement pour ma formation de Bachelor d'applications web

L’objectif est de créer un site internet permettant la gestion des données d'une agence de surveillance.
Consignes techniques :
Le site sera réalisé en HTML5, CSS3, JS ES6+ et PHP 7.
Vous pouvez utiliser un Framework CSS de votre choix.
Vous pouvez utiliser les librairies JS / CSS de votre choix, jQuery inclus.
Vous pouvez utiliser de Framework JS (React, Angular, etc.), de Framework PHP (Symfony, etc...).

Les agents ont un nom, un prénom, une date de naissance, un code d'identification, une nationalité, 1 ou plusieurs spécialités.
Les cibles ont un nom, un prénom, une date de naissance, un nom de code, une nationalité.
Les contacts ont un nom, un prénom, une date de naissance, un nom de code, une nationalité.
Les planques ont un code, une adresse, un pays, un type.
Les missions ont un titre, une description, un nom de code, un pays, 1 ou plusieurs agents, 1 ou plusieurs contacts, 1 ou plusieurs cibles, un type de mission (Surveillance, Infiltration …), un statut (En préparation, en cours, terminé, échec), 0 ou plusieurs planque, 1 spécialité requise, date de début, date de fin.
Les administrateurs ont un nom, un prénom, une adresse mail, un mot de passe, une date de création.

Règle métier :
Sur une mission, la ou les cibles ne peuvent pas avoir la même nationalité que le ou les agents.
Sur une mission, les contacts sont obligatoirement de la nationalité du pays de la mission.
Sur une mission, la planque est obligatoirement dans le même pays que la mission.
Sur une mission, il faut assigner au moins 1 agent disposant de la spécialité requise.

Il vous est ensuite demandé de créer une interface front-office, accessible à tous, permettant de consulter la liste de toutes les missions, ainsi qu’une page permettant de voir le détail d’une mission.

De plus, il faudra créer une interface back-office, uniquement accessible aux utilisateurs de rôle ADMIN, qui va permettre de gérer la base de données de la bibliothèque. Ce back-office va permettre de lister, créer, modifier et supprimer chaque donnée des différentes tables, grâce à des formulaires et des tableaux. Il faut que ces pages ne soient pas accessibles à tout le monde ! Il faudra donc créer une page de connexion et de déconnexion (pas de page d'inscription).
Il faut réaliser le projet en programmation orienté objet, de type MVC (Model Vue Controller). Chaque table de la base de données sera représentée par un objet PHP.

//

Site created as part of a training evaluation for my Bachelor of web applications training

The objective is to create a website allowing the management of data from a monitoring agency.
Technical instructions:
- The site will be produced in HTML5, CSS3, JS ES6 + and PHP 7.
- You can use a CSS framework of your choice.
- You can use the JS / CSS libraries of your choice, jQuery included.
- - You can use JS Framework (React, Angular, etc.), PHP Framework (Symfony, etc ...).

The agents have a name, a first name, a date of birth, an identification code, a nationality, 1 or more specialties.
The targets have a name, a first name, a date of birth, a code name, a nationality.
The contacts have a name, a first name, a date of birth, a code name, a nationality.
The hideouts have a code, an address, a country, a type.
The missions have a title, a description, a code name, a country, 1 or more agents, 1 or more contacts, 1 or more targets, a type of mission (Surveillance, Infiltration, etc.), a status (In preparation, in course, completed, failed), 0 or more hideouts, 1 specialty required, start date, end date.
The administrators have a name, a first name, an email address, a password, a creation date.

Business rule:
- On a mission, the target (s) cannot have the same nationality as the agent (s).
- On a mission, contacts must be of the nationality of the country of the mission.
- On a mission, the hideout must be in the same country as the mission.
- On a mission, you must assign at least 1 agent with the required specialty.

You are then asked to create a front-office interface, accessible to all, allowing you to consult the list of all the missions, as well as a page allowing you to see the details of a mission.

In addition, it will be necessary to create a back-office interface, only accessible to users of the ADMIN role, which will allow the library database to be managed. This back-office will make it possible to list, create, modify and delete each data from the various tables, using forms and tables. These pages must not be accessible to everyone! It will therefore be necessary to create a login and logout page (no registration page). The project must be carried out in object-oriented programming, such as MVC (Model Vue Controller). Each table in the database will be represented by a PHP object.
