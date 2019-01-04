<?
$p_id = intval($_GET['p_id']);
if($_REQUEST['delete'] == "post"){
	$DeletPosts = mysql_query("DELETE FROM posts WHERE p_id = '".$p_id."'");
	if(isset($DeletPosts)){
		echo"
		<div class='success'>تم حدف التدوينة بنجاح</div>
		";
		echo'</div>';
		refresh("admincp.php?type=post",2);
		include"files/block.php";
		include"files/footer.php";
		exit;
	}
}
if($_REQUEST['edit'] == "post"){
	$Sp = "SELECT * FROM posts WHERE p_id = '".$p_id."'";
	$SelectPostToedit = mysql_query($Sp);
	$FetchObPost = mysql_fetch_object($SelectPostToedit);
	#=============[POST VALUE]=======================#
$p_title = strip_tags($_POST['p_title']);
$p_sub = strip_tags($_POST['p_sub']);
$p_pic = strip_tags($_POST['p_pic']);
$category = strip_tags($_POST['category']);
#=============[POST VALUE]=======================#
if(isset($_POST['Updatepost'])){
	$DBpostup = mysql_query("UPDATE posts SET
	p_title='$p_title',
	p_sub='$p_sub',
	p_pic='$p_pic',
	category='$category' WHERE p_id = '".$p_id."'
	");
	if(isset($DBpostup)){
		echo"
		<div class='success'>تم تحديت البيانات بنجاح</div><br />
		";
		refresh("admincp.php?type=post",2);	
		echo'</div>';
		include"files/block.php";
		include"files/footer.php";
		exit;
	}
	
}


	echo'
	<form action="admincp.php?type=post&edit=post&p_id='.$FetchObPost->p_id.'" method="POST">
<table width="100%" border="0">
<tr>
<td>عنوان التدوينة</td>
<td><input name="p_title" type="text" value="'.$FetchObPost->p_title.'" /></td>
</tr>
<tr>
<td>صورة التدوينة</td>
<td><input name="p_pic" type="text" value="'.$FetchObPost->p_pic.'" /></td>
</tr>
<tr>
<td>التصنيف</td>
<td>
<select name="category">
';
$Scate = mysql_query("SELECT * FROM category");
while($FetchCate = mysql_fetch_object($Scate)){
	echo'<option value="'.$FetchCate->c_id.'">'.$FetchCate->c_title.'</option>';
}
echo'
</select>
</td>
</tr>
</table>
<table width="100%" border="0">
<tr>
<td><textarea name="p_sub" style="width:100%;height:240px;">'.$FetchObPost->p_sub.'</textarea>

</td>
</tr>
</table>
<table width="100%" border="0">
<tr>
<td><input name="Updatepost" type="submit" value="تحديت التدوينة" /></td>
</tr>
</table>
</form>
	';
	echo'</div>';
		include"files/block.php";
		include"files/footer.php";
		exit;
	
}
?>


<table width="100%" border="0">

<?
$SelectPOST = mysql_query("SELECT * from posts");
while($FetchP = mysql_fetch_object($SelectPOST)){
echo'
<tr>
<td>'.$FetchP->p_id.'</td>
<td><img src="'.$FetchP->p_pic.'" height="30" width="30" /></td>
<td>'.$FetchP->p_title.'</td>
<td>
<a href="admincp.php?type=post&delete=post&p_id='.$FetchP->p_id.'"><button class="grb">حدف</button></a>
<a href="admincp.php?type=post&edit=post&p_id='.$FetchP->p_id.'"><button class="grb">تعديل</button></a>
</td>
</tr>
';
}

?>
</table>