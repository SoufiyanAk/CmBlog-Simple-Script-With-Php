<?
/*
CREATE TABLE `config` (
`c_name` varchar( 255 ) COLLATE latin1_general_ci NOT NULL ,
`c_url` varchar( 255 ) COLLATE latin1_general_ci NOT NULL ,
`c_email` varchar( 255 ) COLLATE latin1_general_ci NOT NULL ,
`c_desc` text COLLATE latin1_general_ci NOT NULL ,
`c_key` text COLLATE latin1_general_ci NOT NULL ,
`c_close` int( 11 ) NOT NULL ,
`c_close_text` text COLLATE latin1_general_ci NOT NULL ,
`c_copy` varchar( 255 ) COLLATE latin1_general_ci NOT NULL,
) ENGINE = MYISAM DEFAULT CHARSET = latin1 COLLATE = latin1_general_ci;
*/
#=======================[POST]===========================#
$c_name = strip_tags($_POST['c_name']);
$c_url = strip_tags($_POST['c_url']);
$c_email = strip_tags($_POST['c_email']);
$c_desc = strip_tags($_POST['c_desc']);
$c_key = strip_tags($_POST['c_key']);
$c_close = strip_tags($_POST['c_close']);
$c_close_text = strip_tags($_POST['c_close_text']);
$c_copy = strip_tags($_POST['c_copy']);
#=======================[POST]===========================#
$sqlSelectSeet = mysql_query("SELECT * FROM config");
$FetchSett = mysql_fetch_object($sqlSelectSeet);
#=======================[UPDATE INFO]===========================#
if(isset($_POST['savesett'])){
	$settupdate = mysql_query("UPDATE config SET
	
	   c_name= '$c_name',
	   c_url= '$c_url',
	   c_email= '$c_email',
	   c_desc= '$c_desc',
	   c_key= '$c_key',
	   c_close= '$c_close',
	   c_close_text= '$c_close_text',
	   c_copy= '$c_copy'
	
	");

	if(isset($settupdate)){
		echo'
		<div class="success">هنيئا لك تم تحديت البيانات</div><br />
		';
		refresh("admincp.php?type=setting",2);
	}
		
}
#=======================[UPDATE INFO]===========================#
?>

<form action="admincp.php?type=setting" method="POST">
		<table width="100%" border="0">
		<tr>
		  <td>اسم الموقع</td>
		  <td><input name="c_name" type="text" value="<? echo $FetchSett->c_name; ?>" /></td>
		</tr>
		<tr>
		  <td>رابط الموقع</td>
		  <td><input name="c_url" type="text" value="<? echo $FetchSett->c_url; ?>" /></td>
		</tr>
		<tr>
		  <td>وصف الموقع</td>
		  <td><textarea name="c_desc" style="width:400px;height:100px;"><? echo $FetchSett->c_desc; ?></textarea></td>
		</tr>
		
		<tr>
		  <td>بريد الموقع</td>
		  <td><input name="c_email" type="email" value="<? echo $FetchSett->c_email; ?>" /></td>
		</tr>
			<tr>
		  <td>كلمات مفتاحية</td>
		  <td><textarea name="c_key" style="width:400px;height:100px;"><? echo $FetchSett->c_key; ?></textarea></td>
		</tr>
		<tr>
		  <td>حالة الموقع</td>
		  <td><select name="c_close">
		  <?
		  if($FetchSett->c_close == 0){
			  echo'
		  <option value="0">مفتوح</option>
		  <option value="1">مغلق</option>';
		  }else{
			 echo'
			 <option value="1">مغلق</option>
		  <option value="0">مفتوح</option>
		  ';  
		  }
		  ?>
		  </select>
		  </td>
		</tr>
		<tr>
		  <td>رسالة الغلق</td>
		  <td><textarea name="c_close_text" style="width:400px;height:100px;"><? echo $FetchSett->c_close_text; ?></textarea></td>
		</tr>
		<tr>
		  <td>حقوق الموقع</td>
		  <td><input name="c_copy" type="text" value="<? echo $FetchSett->c_copy; ?>" /></td>
		</tr>
		</table>
		<br />
		<table width="100%" border="0">
		<tr><td>
		<input name="savesett" type="submit" value="حفظ البيانات" />
		</td></tr>
