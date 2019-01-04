<? include"files/header.php"; ?>
<?php

    include_once ('files/function.php');

        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
        $limit = 6;
        $startpoint = ($page * $limit) - $limit;
        
        //to make pagination
        $statement = "`posts` where `active` = 1 ORDER BY `p_id` DESC";
?>
<?
$u_name = strip_tags($_POST['u_name']);
$u_pass = md5($_POST['u_pass']);

if(isset($_POST['login'])){

if(empty($u_name) or empty($u_pass)){
	echo"
		<div class='error'>المرجو ملأ جميع بيانات الدخول</div><br />
		";
     refresh("index.php",2);
}else {
$sqlquery = mysql_query("SELECT * FROM user WHERE u_name ='".$u_name."' AND u_pass = '".$u_pass."' ");
if(mysql_num_rows($sqlquery) > 0){

$fecthLquery = mysql_fetch_object($sqlquery);
$uid = $fecthLquery->u_id;
$uname = $fecthLquery->u_name;
$upass = $fecthLquery->u_pass;

if($uname != $uname AND $upass != $upass){
	echo"
		<div class='error'>البيانات خاطئة</div><br />
		";
		refresh("index.php",2);		     


}else{
	setcookie("uid",$uid,time()+60*60*48);
		setcookie("login",1,time()+60*60*48);

	echo"
		<div class='succ'>تم تسجيل الدخول بنجاح نتمنى ان تكون بتمام الصحة و العافية , جاري تحويلك للرئيسية</div><br />
		";
		  refresh("index.php",2);  

}
}else{

echo"
		<div class='error'>البيانات خاطئة</div><br />
		";
refresh("index.php",2);

}
}

}



$Selectpost = mysql_query("SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
while($fetchpost = mysql_fetch_object($Selectpost)){
	$selectuserP = mysql_query("SELECT * FROM user WHERE u_id = '".$fetchpost->p_user."' ");
	$FtechAu = mysql_fetch_assoc($selectuserP);
	$Selecthcctg = mysql_query("SELECT * FROM category WHERE c_id = '".$fetchpost->category."'");
    $FetchScat = mysql_fetch_assoc($Selecthcctg);

	echo'
	<div class="rightco">
<div class="B_t_in">
<div class="title_b"><a style="text-decoration:none; border-bottom: 1px solid #999999;color:#444;font-size:13px;" href="topic.php?id='.$fetchpost->p_id.'"><h3>'.$fetchpost->p_title.'<h3></a></div>
<div class="info">
 بواسطة : '.$FtechAu['u_name'].'
التاريخ : '.ago($fetchpost->p_time).'
في : '.$FetchScat['c_title'].'
 </div>
</div>
<br /><br />
<br />
<table class="tb"width="100%" border="0">
<tr>
<td width="20%"><div class="pic"><img src="'.$fetchpost->p_pic.'" alt="" /></div></td>
<td width="80%">
<p>
'.mb_substr($fetchpost->p_sub,0,300,'UTF-8').' ...
</p>
</td>
</tr>

</table>
<a href="topic.php?id='.$fetchpost->p_id.'"><button class="settm">اقرأ المزيد</button></a>
</div>
';
}

#==============[pagination]=================#
?>
<?php
   echo pagination($statement,$limit,$page);
?>
<? include"files/block.php"; ?>

<? include"files/footer.php"; ?>