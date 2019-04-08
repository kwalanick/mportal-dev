<?php

//database connection
###### db ##########
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'marine';

################
mysql_connect($db_host,$db_username,$db_password)or die(mysql_error());
mysql_select_db($db_name) or die(mysql_error());


?>
