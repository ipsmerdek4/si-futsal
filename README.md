Welcome to Si-FUTSAL

The following are the steps for the SI-FUTSAL installation:
1. install xampp new "recommend version php v 7.4 or above"

2. install composser

3. enable # Virtual hosts
	location : xampp/apache/conf/httpd.conf

	#Include conf/extra/httpd-vhosts.conf  to  Include conf/extra/httpd-vhosts.conf 


4. add # VirtualHost
	location : xampp/apache/conf/extra/httpd-vhosts.conf
	
	
<VirtualHost si-futsal.local:80> <br>
	ServerName si-futsal.local <br>
 	ServerAlias si-futsal.local <br>
	DocumentRoot "C:/xampp/htdocs/si-futsal/public" <br>
	<Directory "C:/xampp/htdocs/si-futsal/public"> <br>
	    Options Indexes FollowSymLinks MultiViews <br>
	    AllowOverride All <br>
	    Require all granted <br>
	<&#47;Directory> <br>
<&#47;VirtualHost> <br>




5. enable # HOST
	location : C:/Windows/System32/drivers/etc/hosts
	
	add
	127.0.0.1 si-futsal.local


6. download or clone si-futsal 
7. open .env
	edit 

	database.default.hostname = 127.0.0.1 <br>
 	database.default.database = si-futsal //match the database name in your phpmyadmin <br>
 	database.default.username = root  //match your username <br>
 	database.default.password =       //match your password <br>


8. open cmd/ Command Prompt $: php spark migrate
9. open cmd/ Command Prompt $: php spark db:seed runsemua




