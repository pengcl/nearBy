<?php
require( dirname(__FILE__) . '/wp-config.php' );
$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
mysql_select_db(DB_NAME);
$action = $_POST["menageTeam"];
	if($action=="creat"){
		echo '<font color="red">'.$action.'</font>';
		}
?>
