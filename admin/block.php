<?
/*
CREATE TABLE `block` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `order` int NOT NULL
) COMMENT='';
*/

$name = strip_tags($_POST['name']);
$content = ($_POST['content']);
$ord = strip_tags($_POST['ord']);
$id = intval($_GET['id']);

if(isset($_POST['Addblock'])){
	$Addblock = mysql_query("INSERT INTO block (name,content,ord) VALUES ('$name','$content','$ord')");
	if(isset($Addblock)){
		echo"
		<div class='success'>تم اضافة القائمة بنجاح</div><br />
		";
			echo'</div>';
	refresh("admincp.php?type=block",2);
		include"files/block.php";
		include"files/footer.php";
		exit;
	}
}
if($_REQUEST['delete'] == "block"){
	$Deleteblock = mysql_query("DELETE FROM block WHERE id = '$id'");
	if(isset($Deleteblock)){
		echo'
		<div class="success">تم حدف القائمة بنجاح</div>
		';
		
	}
	
	
}
if($_REQUEST['edit'] == "block"){
	$SelectblockToedit = mysql_query("SELECT * FROM block WHERE id = '$id'");
	$Fetchbed = mysql_fetch_assoc($SelectblockToedit);
	if($_POST['editblock']){
	$editblock = mysql_query("UPDATE block SET
	name = '$name',
	ord = '$ord',
	content= '$content'
	WHERE id = '$id'
	");
	if(isset($editblock)){
		echo'
		<div class="success">تم تعديل القائمة بنجاح</div></div>
		';
	refresh("admincp.php?type=block",2);
	exit;
	
	}
	}
	echo'
<form action="admincp.php?type=block&edit=block&id='.$Fetchbed['id'].'" method="POST">
<table width="100%" border="0">
   <tr>
       <td>اسم القائمة</td>
	   <td><input name="name" type="text" value="'.$Fetchbed['name'].'" /></td>
   </tr>
    <tr>
       <td>ترتيب القائمة</td>
	   <td><input name="ord" type="text" value="'.$Fetchbed['ord'].'" /></td>
   </tr>
    <tr>
       <td>محتوى القائمة</td>
	   <td><textarea name="content" style="width:80%;height:180px;">'.$Fetchbed['content'].'</textarea></td>
   </tr>
   </table>
<table width="100%" border="0">
    <tr>
       <td></td>
	   <td><input name="editblock" type="submit" value="تعديل" /></td>
   </tr>
  </table>
</form></div><br />
';

		
}
echo'
<form action="admincp.php?type=block" method="POST">
<table width="100%" border="0">
   <tr>
       <td>اسم القائمة</td>
	   <td><input name="name" type="text" value="" /></td>
   </tr>
    <tr>
       <td>ترتيب القائمة</td>
	   <td><input name="ord" type="text" value="" /></td>
   </tr>
    <tr>
       <td>محتوى القائمة</td>
	   <td><textarea name="content" style="width:80%;height:180px;"></textarea></td>
   </tr>
   </table>
<table width="100%" border="0">
    <tr>
       <td></td>
	   <td><input name="Addblock" type="submit" value="اضف قائمة" /></td>
   </tr>
  </table>
</form></div><br />
';

echo'
<div class="adminco">
<table width="100%" border="0">
';
$SelectBlooock = mysql_query("SELECT * FROM block ORDER BY ord ASC");
while($FetchB = mysql_fetch_assoc($SelectBlooock)){
  echo' <tr>
	   <td>'.$FetchB['ord'].'</td>
	   <td>'.$FetchB['name'].'</td>
	   <td>
	   <a href="admincp.php?type=block&edit=block&id='.$FetchB['id'].'"><button class="sett">تعديل</button></a>
	   <a href="admincp.php?type=block&delete=block&id='.$FetchB['id'].'"><button class="sett">حدف</button></a>
	   </td>
   </tr>
   ';
}
   echo'
   </table>

';
?>