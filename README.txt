Créer un plugin à partir du modèle d'exemple:


	1. Changer le nom du plugin et la description dans le fichier MRL-Example.php

	2. Changer les noms des fonctions register_activation et register_deactivation dans MRL-Example.php

	3. Changer le nom du dossier ainsi que le fichier MRL-Example.php avec le nom de la page que vous voulez créé.

	4. Remplacer le nom des options là où il est écris mrl_example_plugin par mrl_nomduplugin_plugin.

	5. Remplacer les groupes d'options mrl_example_plugin_settings par mrl_nomduplugin_plugin_settings.

		Tips: 	utiliser la fonction Search de Visual Code Studio qui vous permez de trouver tous les endroit où se trouve une phrase
			et de pouvoir la remplacer.

	6. Changer le nom du @package sur tous les fichier qui en contient par le nom de votre plugin.

	7. Configurer les Namespaces
		7a. Supprimer le dossier Vendor et le fichier composer.json
		7b. Dans le terminal, aller dans le dossier du plugin puis lancer composer init pour configurer le fichier composer.json
		7c. Aller dans le fichier composer.json et insérer cla ligne suivante en dessous de "require":{}, (ne as oublier d'ajouter la virgule après le "require"):
			"autoload": {
        			"psr-4": {"NonDuNamespace\\":"./src"}
   			 }
		7d. Lancer composer intsall dans le terminal pour pouvoir installer les namespaces.
		7e. Remplacer les anciens namespaces Example par celui que vous avez choisi.

		Tips: utiliser le même tips précédent.

	8. Changer le nom des ficher css et js, puis les faire correspondre dans src > Base > Enqueue.php dans la fonction enqueue().



	9. Ajouter des sous-pages à un plugin:

		9a. L'ajouter dans l'array $managers_admin dans src > Base > BaseController.php. 
			// A ce niveau, il devrait être possible de cocher la case correspondant au nom de la sous page. Même si cela ne donne rien.

		9b. Ajouter son controlleur en créant un fichier php dans src > Base.

		9c. Copier/Coller la structure du controlleur depuis l'un des deux controlleurs d'exemples

		9d. Changer le nom de la class du controlleur.

		9e. Copier la clé du tableau corespondant à la sous-page créé que vous avez entré dans l'array $managers_admin dans src > Base > BaseController.php.

		9f. Coller la dans le controlleur que vous venez de créer à la ligne 24 (dans la condition if de la fonction register()) et à la ligne 62 (dans 'menu_slug')

		9g. Remplacer le titre de la page dans les lignes 59 et 60 (dans 'menu_title' => et 'page_title' =>).

		9h. Changer le nom du callback à la ligne 63 ('callback' =>)

		9i. Aller dans src > API > Callbacks > AdminCallbacks.php. Rajouter le callback de l'étape précédente.
			Dans cette fonction, retourner un require_once du fichier php qui va servier de visuel dans la partie admin.

		9j. Aller dans le dossier templates et créer le fichier qui correspondra au visuel. Il faut qu'il est le même nom que ce qui a été inséré à l'étape précédente.

		9k. Pour finir, aller dans src > Init et inserer la class de votre controlleur dans le return de la fonction get_services pour pouvoir l'appeler.


	10. Changer la page principale:
	
		10a. Aller dans src > Pages > Dashboards.php

		10b. Changer menu_title pour le nom de la page dans la fonction setPages

		10c. Changer icon_url dans la même fonction pour changer l'image de l'icone

			Tips: taper dashicons sur google et vous tomberez sur le site wordpress qui vous fournis les dashicons
