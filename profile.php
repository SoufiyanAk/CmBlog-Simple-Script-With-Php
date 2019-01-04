<?
include"files/header.php";
if(type == ""){
	
	
}elseif(type == "edit"){
	
$u_name = strip_tags($_POST['u_name']);
$u_pass = md5($_POST['u_pass']);
$u_email = strip_tags($_POST['u_email']);
$u_img = strip_tags($_POST['u_img']);
if(isset($_POST['updateuser'])){
	
	$updateinfo = mysql_query("UPDATE user SET
	u_name = '$u_name',
	u_pass = '$u_pass',
	u_email = '$u_email',
	u_img = '$u_img'

	WHERE u_id = '".uid."'
	");
	if($updateinfo){
		echo'
		<div class="success">تم تحديت بياناتك بنجاح</div>
		';
		refresh("profile.php?type=edit",3);
	}
}

echo'
<div class="regist">
<form action="profile.php?type=edit" method="post">
<table width="100%" border="0">
<td>صورة العضوية</td>
<td><input style="border:1px solid #E9E4E4;padding:8px 5px;" size="30" value="'.u_img.'" name="u_img" type="text"/></td><tr>
<td>إسم العضوية</td>
<td><input style="border:1px solid #E9E4E4;padding:8px 5px;" size="30" value="'.uname.'" name="u_name" type="text"/></td><tr>
<td>كلمة السر</td>
<td><input style="border:1px solid #E9E4E4;padding:8px 5px;" size="30" name="u_pass" type="password"/></td><tr>
<td>البريد الإلكتروني</td>
<td><input style="border:1px solid #E9E4E4;padding:8px 5px;" size="30" value="'.uemail.'" name="u_email" type="email"/></td><tr>

<td><input class="regi-botton" name="updateuser" type="submit" value="تحديت"/></td><tr>

</table>
</form>
</div>
';

}
include"files/block.php";
include"files/footer.php";


?>