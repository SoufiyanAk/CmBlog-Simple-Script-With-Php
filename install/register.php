<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css" type="text/css" />
  <title>صفحة تتبيت سكربت cmblog</title>
<?

 include"../include/config.php";
$u_name = strip_tags($_POST['u_name']);
$u_pass = md5($_POST['u_pass']);
$u_email = strip_tags($_POST['u_email']);
$u_img = strip_tags($_POST['u_img']);
if(isset($_POST['registerdo'])){
	
	if(empty($u_name) or empty ($u_pass) or empty ($u_email) or empty ($u_img) ){
		
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
		(u_name,u_pass,u_email,u_img,u_lev) 
		VALUES 
		('$u_name','$u_pass','$u_email','$u_img','3')
		") or die (mysql_error());
		if(isset($DBadduser)){
			
	echo"
		<div class='success'>هنيئا لك تم تسجيل عضويتك بنجاح يمكنك الآن الدخول للموقع</div><br>
		<td><a href='../index.php'><button class='grb'>مبرررروك يمكنك الآن التوجه للصفحة الرئيسية اضغط هنا</button></a></td>
		";

		exit;
		}
	}
}
?>

<div class="regist">
<form action="../install/register.php" method="post">
<table width="100%" border="0">
<td>إسم العضوية</td>
<td><input style="border:1px solid #E9E4E4;padding:8px 5px;" size="30" name="u_name" type="text"/></td><tr>
<td>كلمة السر</td>
<td><input style="border:1px solid #E9E4E4;padding:8px 5px;" size="30" name="u_pass" type="password"/></td><tr>
<td>البريد الإلكتروني</td>
<td><input style="border:1px solid #E9E4E4;padding:8px 5px;" size="30" name="u_email" type="email"/></td><tr>
<td>صورة العضوية</td>
<td><input style="border:1px solid #E9E4E4;padding:8px 5px;" size="30" name="u_img" type="text"/></td><tr>

<td><input class="regi-botton" name="registerdo" type="submit" value="تسجيل"/></td><tr>

</table>
</form>
</div>




<div class='error'>المرجو حدف ملف install لعدم التعرض للاختراق</div><br />