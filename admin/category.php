<?
/*
CREATE TABLE `category` (
`c_id` int( 11 ) NOT NULL AUTO_INCREMENT ,
`c_title` varchar( 255 ) COLLATE latin1_general_ci NOT NULL ,
PRIMARY KEY ( `c_id` )
) ENGINE = MYISAM DEFAULT CHARSET = latin1 COLLATE = latin1_general_ci;
*/
$c_title = strip_tags($_POST['c_title']);
$c_id = intval($_GET['c_id']);
if(isset($_POST['Addcat'])){
	$Addcat = mysql_query("INSERT INTO category
	(c_title)
	VALUES
	('$c_title')
	");
	if(isset($Addcat)){
		echo'
		<div class="success">تم اضافة التصنيف بنجاح</div>
		';
		refresh("admincp.php?type=category",2);
		echo'</div>';
		 include"files/block.php";
         include"files/footer.php";
		exit;
	}
}
if($_REQUEST['delete'] == "cat"){
	$Deletecat = mysql_query("DELETE  FROM category WHERE c_id = '".$c_id."'");
		
		if(isset($Deletecat)){
		echo'
		<div class="success">تم حدف التصنيف بنجاح</div>
		';
		refresh("admincp.php?type=category",2);
	  
	}
}
if($_REQUEST['edit'] == "cat"){
	$SelectC = mysql_query("SELECT * FROM category WHERE c_id = '".$c_id."'");
	$FetchCateg = mysql_fetch_object($SelectC);
	if(isset($_POST['EditCat'])){
		$Editcatego = mysql_query("UPDATE category SET
				c_title ='$c_title'
				WHERE c_id ='".$c_id."'
		");
		if(isset($Editcatego)){
				echo'
		<div class="success">تم تعديل التصنيف بنجاح</div>
		';
		refresh("admincp.php?=category",2);
		echo'</div>';
		 include"files/block.php";
         include"files/footer.php";
		exit;
		
			
		}
	}
	
	echo'<form action="admincp.php?type=category&edit=cat&c_id='.$FetchCateg->c_id.'" method="POST">
<table width="100%" border="0">
<tr>
<td>اسم التصنيف</td>
<td><input name="c_title" type="text" value="'.$FetchCateg->c_title.'" /></td>
</tr>
</table>
<table width="100%" border="0">
<tr>
<td><input name="EditCat" type="submit" value="تعديل التصنيف" /></td>
</tr>
</table>
</form>
</div><br />';
 
		include"files/block.php";
         include"files/footer.php";
		exit;
}
?>


<form action="admincp.php?type=category" method="POST">
<table width="100%" border="0">
<tr>
<td>اسم التصنيف</td>
<td><input name="c_title" type="text" value="" /></td>
</tr>
</table>
<table width="100%" border="0">
<tr>
<td><input name="Addcat" type="submit" value="اضف التصنيف" /></td>
</tr>
</table>
</form>
</div><br />
<div class='adminco'>
<table width="100%" border="0"><br />
<tr>
<br /><td>اسم التصنيف</td>
<td>اعدادات
</tr>
<?
$SelectCat = mysql_query("SELECT * from category");
while($Fetchc = mysql_fetch_object($SelectCat)){
echo'
<tr>
<td>'.$Fetchc->c_title.'</td>
<td>
<a href="admincp.php?type=category&delete=cat&c_id='.$Fetchc->c_id.'"><button class="grb">حدف</button></a>
<a href="admincp.php?type=category&edit=cat&c_id='.$Fetchc->c_id.'"><button class="grb">تعديل</button></a>
</td>
</tr>
';
}
?>
</table>
