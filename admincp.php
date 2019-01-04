<?
include"files/header.php"; 

if(ulev == 3){
	$SelectCm = mysql_query("SELECT * FROM comments WHERE cm_active = '1'");
	echo"
		<a href='admincp.php?type=setting'><button class='sett'>اعدادات الموقع</button></a>
		<a href='admincp.php?type=category'><button class='sett'>تصنيفات</button></a>
		<a href='admincp.php?type=post'><button class='sett'>التدوينات</button></a>
		<a href='admincp.php?type=addpost'><button class='sett'>اضف تدوينة</button></a>
		<a href='admincp.php?type=comments'><button class='sett'>تعليقات تنتضر : (".mysql_num_rows($SelectCm).")</button></a>
	    <a href='admincp.php?type=block'><button class='sett'>قوائم</button></a>
	    <a href='admincp.php?type=ads'><button class='sett'>اعلانات</button></a>
	<div class='adminco'>";
	
	if(type == ""){
		echo'
		<table width="100%" border="0">
		<tr>
		   <td>اسم السكربت :</td>
		   <td>cmblog</td>
		</tr>  
<tr>
		   <td>الاصدار :</td>
		   <td>v2.0</td>
		</tr>  
<tr>
		   <td>مبرمج السكربت :</td>
		   <td>comix</td>
		</tr>  
<tr>
		   <td>للتواصل معي :</td>
		   
		   <td>facebook.com/comix.h</td>
		</tr>  
<tr>
		   <td>موقع المبرمج :</td>
		   <td>www.cm-blog.com</td>
		</tr>  

		</table>
		';
		
		
	}
	elseif(type == "setting"){include"admin/setting.php";}
	elseif(type == "addpost"){include"admin/addpost.php";}
	elseif(type == "category"){include"admin/category.php";}
	elseif(type == "post"){include"admin/post.php";}
	elseif(type == "comments"){include"admin/comments.php";}
	elseif(type == "block"){include"admin/block.php";}
	elseif(type == "ads"){include"admin/ads.php";}
	elseif(type == "usr"){include"admin/usr.php";}
	
	echo'</div>';
}else{
	header("Location: index.php");
	
}


?>