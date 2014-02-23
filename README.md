/*---------------repository for development--------------------*/


1-> library folder will have all .php files which contain business logic and other php coding

2-> all library classes will have letsEat as namespace. this will help to keep some classes as global classes. which can be loaded before actuall application.

3->public folder will have all css,js,html code.

================

things remaining 

1. setting up virtual host

=============================


add following line to C:\wamp\www\letsEat_dev\.git\info\exclude

library/Framework/*

download silex (slim), twig, doctrine on your system and place them in Framework folder.

it has some dependancy over system so we need different copy on every system. we will add new copy for production master (when we get a client)

===============================================


accessing website...

go to http://localhost/letsEat_dev/index.php/pratik

if you add routes access as http://localhost/letsEat_dev/index.php/{route name}

