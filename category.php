<?
include"files/header.php";
$id = intval($_GET['id']);

$Selectpost = mysql_query("SELECT * FROM posts WHERE category ='$id' ORDER BY p_id DESC");

if(mysql_num_rows($Selectpost) > 0){
while($fetchpost = mysql_fetch_object($Selectpost)){
	$selectuserP = mysql_query("SELECT * FROM user WHERE u_id = '".$fetchpost->p_user."' ");
	$FtechAu = mysql_fetch_assoc($selectuserP);
	$Selecthcctg = mysql_query("SELECT * FROM category WHERE c_id = '".$fetchpost->category."'");
    $FetchScat = mysql_fetch_assoc($Selecthcctg);
	echo'
	<div class="rightco">
<div class="B_t_in">
<div class="title_b"><a style="text-decoration:none; border-bottom: 1px solid #999999;color:#444;font-size:13px;"<a href="topic.php?id='.$fetchpost->p_id.'"><h3>'.$fetchpost->p_title.'<h3></a></div>
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
}else{
	echo'
	<div style="padding:13px;background:#92dff2;border:1px solid #2c92ab;color:#0f7b96;font:12px tahoma;">
		لا توجد حاليا اي تدوينة في هدا التصنيف
		</div><br />
	';
}
include"files/block.php";
include"files/footer.php";
?>