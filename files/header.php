<?
ob_start();
?>
<? include"include/config.php";?>
<? include"include/function.php";

define("uid",$_COOKIE['uid']);
define("login",$_COOKIE['login']);
define("type",$_GET['type']);
$QuerySelectU = mysql_query("SELECT * FROM user WHERE u_id = '".uid."'");
$FetchObjectU = mysql_fetch_object($QuerySelectU);
$Selectadsco = mysql_query("SELECT * FROM ads");
$FetchAdss = mysql_fetch_assoc($Selectadsco);
#=====================/user info /================#
define("u_id",$FetchObjectU->u_id);
define("uname",$FetchObjectU->u_name);
define("uemail",$FetchObjectU->u_email);
define("u_img",$FetchObjectU->u_img);
define("ulev",$FetchObjectU->u_lev);
#=====================// user info //==============#
?>
<!-- CREATED BY SOUFIYAN AK - COMIX -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo c_name;?></title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/pagination.css" type="text/css" />
 <link href='http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:bold' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:bold' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'/>
<script src="//cdn.ckeditor.com/4.4.6/full/ckeditor.js"></script>
<meta content='<? echo c_desc;?>' name='description'/>
<meta content='<? echo c_key;?>' name='keywords'/>

<script type='text/javascript'>
//<![CDATA[ eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('4.a=b(){d 0=8.9("c");j(0==i){4.h.2="1://5.3-6.7"};0.e("2","1://5.3-6.7");0.f="g"};',20,20,'copy|http|href|cm|window|www|blog|com|document|getElementById|onload|function|credit|var|setAttribute|innerHTML|cmb|location|null|if'.split('|'),0,{}))
//]]>
</script>
</head>
<?
if(c_close == 1){
	if(ulev < 3){
		
		echo"
		<div class='error'>".c_close_text."</div>
		";
		exit;
	}
	
}
?>
<!-- HEADER -->
<div class="header_b">


<div class="navTop" >
<div class="container">
<ul>
<li><a href="index.php">الرئيسية</a></li>
<?
if(login != 1){echo'<li><a href="register.php">تسجيل</a></li>';}else{echo'<li><a href="logout.php">خروج</a></li>';}
if(ulev == 3){
echo'
<li><a href="admincp.php">الإدارة</a></li>

';
}
if(ulev > 0){
	echo'
	<li><a href="profile.php?type=edit">بياناتي</a></li>
	';
	
}
?>


</ul><div class="clear"></div>
</div>


<div class="Head container">
<div class="logo">

<img src="http://cdn.top4top.net/i_88def715831.png" width="200px">


</div>
<div class="ads">
<?
if($FetchAdss['active1'] == 0){
	echo $FetchAdss['code1'];
}

?>
</div>
<div class="clear"></div>

</div>
<div class="navbar">
<div class="container">

<ul>
<?
$SelecCategory = mysql_query("SELECT * FROM category");
while($FetchCategory = mysql_fetch_assoc($SelecCategory)){
	echo'<li><a href="category.php?id='.$FetchCategory['c_id'].'">'.$FetchCategory['c_title'].'</a></li>
';
	
}
?>
</ul>
</div>

</div>
</div><br /><br />


<!-- // HEADER -->


<!-- CONTENT -->

<div class="container">
<div style="float:right;width:600px;">