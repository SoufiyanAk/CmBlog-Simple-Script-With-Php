<?
include"files/header.php"; 
if(login == 1){
	setcookie("uid","",time()+60*60*48);
		setcookie("login","",time()+60*60*48);
		echo"
		<div class='success'>تم تسجيل الخروج بنجاح , نتمنى عودتك قريبا</div><br />
		";
     refresh("index.php",4);
	 }else{
		 echo"
		<div class='error'>الصفحة المطلوبة غير موجودة .</div><br />
		";
     refresh("index.php",4);
		 
		 
	 }
	 
include"files/block.php"; 
include"files/footer.php"; 



?>