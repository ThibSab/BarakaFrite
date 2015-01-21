BarakaFrite


Pour faire marcher l'authentification
-------------------------------------
Download and install composer in https://getcomposer.org/download/

Go to BarakaFrite folder and run :

composer install

To configure the path of log writer you must change the path in BarakaFrite/config/autoload/globa.php line 29

Test the example with : http://localhost/zend_tuto/public/success


Si après cette manipulation, l'authentification ne marche toujours pas, copier l'intégralité du dossier "vendor" de ce projet: https://github.com/lastrecrue/zend_tuto
dans le vôtre

--------------------------------------

Pour la base de donnée
--------------------------------------
Dans phpMyAdmin créer la base "barakabase" puis executer le scrip sql du fichier barakabase.sql
--------------------------------------
