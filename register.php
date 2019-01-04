<? include"files/header.php"; ?>
  
<?
if(login ==1){
	
	echo"
		<div class='error'>عدرا انت عضو مسجل</div><br />
		";
	refresh("index.php",2);
}else{

$u_name = strip_tags($_POST['u_name']);
$u_pass = md5($_POST['u_pass']);
$u_email = strip_tags($_POST['u_email']);

if(isset($_POST['registerdo'])){
	
	if(empty($u_name) or empty ($u_pass) or empty ($u_email) ){
		
		echo"
		<div class='error'>المرجو ملأ جميع بيانات التسجيل</div><br />
		";
		
	}elseif(strlen($u_name) > 12){
		
		echo"
		<div class='error'>على اسمك ان يكون اقل من 12 حرف</div><br>
		";
	}elseif(strlen($u_name) < 3){
		echo"
		<div class='error'>على اسمك ان يكون اكبر من 4 احرف</div><br>
		";
	}else{
		
		$DBadduser = mysql_query("INSERT INTO user 
		(u_name,u_pass,u_email,u_lev) 
		VALUES 
		('$u_name','$u_pass','$u_email','1')
		") or die (mysql_error());
		if(isset($DBadduser)){
			
	echo"
		<div class='success'>هنيئا لك تم تسجيل عضويتك بنجاح يمكنك الآن الدخول للموقع</div><br>
		";
include"files/block.php"; 
include"files/footer.php"; 
		exit;
		}
	}
}
?>

<div class="regist">
<form action="register.php" method="post">
<table width="100%" border="0">
<td>إسم العضوية</td>
<td><input style="border:1px solid #E9E4E4;padding:8px 5px;" size="30" name="u_name" type="text"/></td><tr>
<td>كلمة السر</td>
<td><input style="border:1px solid #E9E4E4;padding:8px 5px;" size="30" name="u_pass" type="password"/></td><tr>
<td>البريد الإلكتروني</td>
<td><input style="border:1px solid #E9E4E4;padding:8px 5px;" size="30" name="u_email" type="email"/></td><tr>

<td><input class="regi-botton" name="registerdo" type="submit" value="تسجيل"/></td><tr>

</table>
</form>
</div>


<? } ?>
<? include"files/block.php"; ?>
<? include"files/footer.php"; ?>