<?
$Db = array(
"hostname"=>"localhost",
"dbname"=>"cmb2",
"dbuser"=>"root",
"dbpass"=>"root",
);
$Dbconnect = mysql_connect($Db['hostname'],$Db['dbuser'],$Db['dbpass']) or die(mysql_error());
$DbSelect = mysql_select_db($Db['dbname']) or die(mysql_error());
#==============[SETTING]=====================#
$sqlSelectS = mysql_query("SELECT * FROM config");
$FetchSe = mysql_fetch_object($sqlSelectS);

define("c_name",$FetchSe->c_name);
define("c_url",$FetchSe->c_url);
define("c_email",$FetchSe->c_email);
define("c_desc",$FetchSe->c_desc);
define("c_key",$FetchSe->c_key);
define("c_close",$FetchSe->c_close);
define("c_close_text",$FetchSe->c_close_text);
define("c_copy",$FetchSe->c_copy);

#==============[SETTING]======================#

?>