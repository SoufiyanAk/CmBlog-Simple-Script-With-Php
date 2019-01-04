<?
/*
CREATE TABLE `ads` (
  `active1` int NOT NULL,
  `active2` int NOT NULL,
  `code1` text NOT NULL,
  `code2` text NOT NULL
  `logo` text NOT NULL
) COMMENT='';
*/
$SELECTads = mysql_query("SELECT * FROM ads");
$fetchAds = mysql_fetch_assoc($SELECTads);

$active1 = $_POST['active1'];
$active2 = $_POST['active2'];
$code1 = $_POST['code1'];
$code2 = $_POST['code2'];
$logo = $_POST['logo'];
if(isset($_POST['upads'])){
	$Upads = mysql_query("UPDATE ads SET
	active1 = '$active1',
	active2 = '$active2',
	code1 = '$code1',
	code2 = '$code2',
	logo = '$logo'
	");
	if(isset($Upads)){
		echo'
		<div class="success">تم تحديت البيانات بنجاح</div>
		';
					refresh("admincp.php?type=ads",2); 
	}
}
?>

<form action="admincp.php?type=ads" method="post">

  <table width="100%" border="0">
    <tr>
	    <td>الإعلان الاول</td>
		<td>
		   <select name="active1">
		   <?
		   if($fetchAds['active1'] == 0){
		     echo' <option value="0">مفعل</option>
		      <option value="1">غير مفعل</option>
			  ';
		   }else{
			 echo' 
			 <option value="1">غير مفعل</option>
			 <option value="0">مفعل</option>
			  ';  
		   }
		   ?>
		   </select>
        </td>
    </tr>
    <tr>
        <td>كود HTML</td>	
        <td><textarea name="code1" style="width:99%;height:150px;"><? echo $fetchAds['code1'];?></textarea></td>		
	</tr>
	  <tr>
	    <td>الإعلان الثاني</td>
		<td>
		   <select name="active2">
		      	   <?
		   if($fetchAds['active2'] == 0){
		     echo' <option value="0">مفعل</option>
		      <option value="1">غير مفعل</option>
			  ';
		   }else{
			 echo' 
			 <option value="1">غير مفعل</option>
			 <option value="0">مفعل</option>
			  ';  
		   }
		   ?>
		   </select>
        </td>
    </tr>
    <tr>
        <td>كود HTML</td>	
        <td><textarea name="code2" style="width:99%;height:150px;"><? echo $fetchAds['code2'];?></textarea></td>	
	</tr>
	<tr>
	
	   <td colspan="2"><input name="upads" type="submit" value="تحديث" /></td>
	</tr>
	   
  </table>
  
</form>  
			  