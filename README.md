# Projet Malton

Ce projet a été réalisé par l'équipe : 
BONNAFOUS Anaël
LE SAUX Logan
NEYRET Mathieu
NICOLAS Théo

# Commandes à lancer :
git clone https://github.com/mathieuneyret/NewMalton.git
composer install
php bin/console hautelook:fixtures:load (pour load les fixtures de base)

L'accès au backoffice se fait sur /admin
Exemple compte admin => mail : logan.lesaux@gmail.com, mdp : symfony 

# First Step

git clone https://github.com/mathieuneyret/NewMalton.git

composer install

# Migrations

php bin/console doctrine:migrations:migrate

# Fixtures :

Les fixtures sont load via la commande : php bin/console hautelook:fixtures:load

# Easy Coding Standard
Le bundle symplify/easy-coding-standard (https://github.com/symplify/easy-coding-standard) est utilisé pour rendre tout joli le code <3

Commande : vendor/bin/ecs check src
Deuxième commande : vendor/bin/ecs check src --fix