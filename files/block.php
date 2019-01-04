</div>
<div class="Block1">

<?
if(login == 1){
echo'<div class="titleblock"><h3>معلومات العضو : '.uname.'<h3></div>
<div class="Contentblock">

<table width="100%" border=0>
<tr>
<td>صورة العضوية :</td>
<td colspan="2"><img src="'.u_img.'" alt="" width="100" /></td>
</tr>
<tr>
<td>اسم العضوية :</td>
<td>'.uname.'</td>
</tr>

<tr>
<td>البريد الالكتروني :</td>
<td>'.uemail.'</td>
</tr>

<tr>
<td>رقم العضوية :</td>
<td>'.uid.'</td>
</tr>
<tr>
<td>الرتبة :</td>
<td>';

if(ulev == 1){echo"<font color='blue'>عضو</font>";}
elseif(ulev == 2){echo"<font color='green'>مدون</font>";}
elseif(ulev == 3){echo"<font color='red'>مدير</font>";}
echo'


</td>
</tr>


</table>


</div>';
}else{
    
  	echo'<div class="titleblock"><h3>تسجيل الدخول<h3></div>
<div class="Contentblock">


<form action="index.php" method="post">
<table width="100%" border=0>
<tr>
<td>اسم العضوية</td>
<td><input style="border:1px solid #E9E4E4;padding:8px 5px;"  name="u_name" type="text" /></td>
</tr>
<tr>
<td>كلمة السر</td>
<td> <input   name="u_pass" type="password" /> </td>
</tr>
</table>
<table width="100" border=0>

<tr>
<td><input class="regi-botton" name="login" value="تسجيل الدخول" type="submit" /></td>
</tr>
</table>

</form>
</div>';	
}

$SelectBlock = mysql_query("SELECT * FROM block ORDER BY ord ASC");
while($FetchBlock = mysql_fetch_assoc($SelectBlock)){
	echo'
	<div class="titleblock"><h3>'.$FetchBlock['name'].'<h3></div>
<div class="Contentblock">
'.$FetchBlock['content'].'
</div>
	';
}
	

?>




</div>
<div class="clear"></div>