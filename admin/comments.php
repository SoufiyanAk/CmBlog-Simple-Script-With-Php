<?
$id = intval($_GET['id']);
if($_REQUEST["active"] == "cm"){

   $UpdateCmActive = mysql_query("Update comments SET cm_active ='0' WHERE cm_id = '$id'");
   if(isset($UpdateCmActive)){
	   echo"
	   <div class='success'>تم تفعيل التعليق بنجاح</div>
	   ";
	   refresh("admincp.php?type=comments",2);	
   }

	echo'</div>';
		include"files/block.php";
		include"files/footer.php";
		exit;	
}
echo"
     <table width='100%' border='0'>
";
while($comm = mysql_fetch_assoc($SelectCm)){
echo"
<tr>
     <td>".$comm['comments']."</td><br />
	 <td>

	 
<a href='admincp.php?type=comments&active=cm&id=".$comm['cm_id']."'><button class='sett'>موافقة</button></a>
	 </td>
	 
</tr>
";
}
echo"
</table>
";	 
?>