<?php require( dirname(__FILE__) . '/wp-config.php' );

$openid = $_POST['openid'];

$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
mysql_select_db(DB_NAME);
$sql = "select wx_openid from nearby_user where wx_openid = '".$openid."'";
$query=mysql_query($sql);
$total=mysql_num_rows($query);
if($total==0){
	$sql = "insert into nearby_user (wx_openid) values ('".$openid."')";
	mysql_query($sql,$con);
	mysql_close($con);
	}
	else {
		}
	?>
