<?
/*
CREATE TABLE `posts` (
`p_id` int( 11 ) NOT NULL AUTO_INCREMENT ,
`p_title` varchar( 255 ) COLLATE latin1_general_ci NOT NULL ,
`p_sub` longtext COLLATE latin1_general_ci NOT NULL ,
`p_time` varchar( 255 ) COLLATE latin1_general_ci NOT NULL ,
`p_user` int( 11 ) NOT NULL ,
PRIMARY KEY ( `p_id` )
) ENGINE = MYISAM DEFAULT CHARSET = latin1 COLLATE = latin1_general_ci;
*/
#=============[POST VALUE]=======================#
$p_title = strip_tags($_POST['p_title']);
$p_sub = $_POST['p_sub'];
$p_pic = strip_tags($_POST['p_pic']);
$category = strip_tags($_POST['category']);
#=============[POST VALUE]=======================#

if(isset($_POST['Addpost'])){
	if(empty($p_title) or empty ($p_sub) ){
		
		echo"
		<div class='error'>المرجو التأكد من ملأ جميع بيانات التدوينة</div><br />
		";

}else{
$addpost = mysql_query("INSERT INTO posts
(p_title,p_sub,p_pic,p_time,p_user,category)
VALUES
('$p_title','$p_sub','$p_pic','".time()."','".u_id."','$category')");

if(isset($addpost)){
	echo"
		<div class='success'>تم اضافة التدوينة بنجاح</div><br />
		";
	     refresh("admincp.php?type=addpost",2);

}
}
}
?>

<form action="admincp.php?type=addpost" method="POST">
<table width="100%" border="0">
<tr>
<td>عنوان التدوينة</td>
<td><input name="p_title" type="text" value="" /></td>
</tr>
<tr>
<td>صورة التدوينة</td>
<td><input name="p_pic" type="text" value="" /></td>
</tr>
<tr>
<td>التصنيف</td>
<td>
<select name="category">
<?
$Scate = mysql_query("SELECT * FROM category");
while($FetchCate = mysql_fetch_object($Scate)){
	echo'<option value="'.$FetchCate->c_id.'">'.$FetchCate->c_title.'</option>';
}
?>
</select>
</td>
</tr>
</table>
<table width="100%" border="0">
<tr>

<td><textarea name="p_sub" style="width:100%;height:240px;"><? echo $FetchSett->c_key;?></textarea>

 <script>
            CKEDITOR.replace( 'p_sub' );
        </script>

</td>
</tr>
</table>
<table width="100%" border="0">
<tr>
<td><input name="Addpost" type="submit" value="اضف تدوينة" /></td>
</tr>
</table>
</form>



