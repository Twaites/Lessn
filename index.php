<?php
include('-/config.php');
include('-/db.php');
// redirect
if (isset($_GET['token']))
{
	@list($token, $ext) = explode('.', $_GET['token'], 2);
	if(is_numeric($token)){
			header($_SERVER['SERVER_PROTOCOL'].' 301 Moved Permanently');
			header('Location:'.stripslashes(NUMERIC_LINKS.$token));
			exit();
	}else{
		if ($result = mysql_query('SELECT * FROM `'.DB_PREFIX.'urls` WHERE short_link="'.$token.'" LIMIT 1')){
			if ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
				mysql_query('INSERT INTO `'.DB_PREFIX.'log` SET short_link="'.$_GET['token'].'", ip="'.$_SERVER['REMOTE_ADDR'].'", referrer="'.$_SERVER['HTTP_REFERER'].'", useragent="'.$_SERVER['HTTP_USER_AGENT'].'", datetime="'.date("Y-m-d H:m:s").'"');
				mysql_query('UPDATE `'.DB_PREFIX.'urls` SET `visits`="'.($row['visits']+1).'" WHERE short_link="'.$token.'"');
				header($_SERVER['SERVER_PROTOCOL'].' 301 Moved Permanently');
				header('Location:'.stripslashes($row['url']));
				exit();
			}
		}
	}
}

// no redirect
header($_SERVER['SERVER_PROTOCOL'].' 301 Moved Permanently');
header('Location:'.DEFAULT_LINK);
exit();

