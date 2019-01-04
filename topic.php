
<? 
include'files/header.php';

$id = intval($_GET['id']);
#====================[DB POST]=====================#
$SelectTopic = mysql_query("SELECT * FROM posts WHERE p_id = '$id'");
$FetchTopic = mysql_fetch_assoc($SelectTopic);
#====================[//DB POST]=====================#
if(mysql_num_rows($SelectTopic) > 0){
echo'
<div style="background:#fff;border:1px solid #F9F9F9;padding:10px;border-radius:2px;">
<div style:"padding:6px;border-bottom:1px solid #FCFCFC;margin-bottom:6px;"><h3>'.$FetchTopic['p_title'].'</h3></div>
<div style="margin-bottom:6px;"><img style="max-width:650px;"src="'.$FetchTopic['p_pic'].'" alt="" /></div>
<div style="">
<p>'.$FetchTopic['p_sub'].'</p>
</div><br />
<center>
';
if($FetchAdss['active2'] == 0){
	echo $FetchAdss['code2'];
}
echo'
</center>
</div><br /><br />
';

  $SelectCm = mysql_query("SELECT * FROM comments WHERE post = '$id' AND cm_active='0'");
echo'
  <div style="margin-bottom:6px;background:#0c93b5;padding:10px 8px;color:#fff;font-size:12px;display:inline-block;">التعليقات : '.mysql_num_rows($SelectCm).'</div>
  ';
  if(mysql_num_rows($SelectCm) > 0){
	  
	  
 
  echo'
  <div style="background:#fff;border:1px solid #F9F9F9;padding:5px;border-radius:2px;">
  <table width="100%" border="0">
 
  ';

  while($Fetchcm = mysql_fetch_assoc($SelectCm)){
	  $SelectUsercm = mysql_query("SELECT * FROM user WHERE u_id = '".$Fetchcm['user']."' ");
	  $fetchUsercm = mysql_fetch_assoc($SelectUsercm);
  echo'
  <tr>
     <td style="border-bottom:1px dotted #F9F9F9;padding:5px;background:#fafafa;">'.$fetchUsercm['u_name'].'
     <div style="float:left;"><img src="'.$fetchUsercm['u_img'].'" width="40" height="40" alt="" /></div></td>
	 </tr>
	 <tr>
     <td style="border-bottom:1px dotted #F9F9F9;padding:5px;background:#F9F9F9;">'.$Fetchcm['comments'].'</td>
 </tr>
';
}
echo'  
  </table>

  </div><br />
';
  }else{
	  echo'
		<div style="padding:13px;background:#92dff2;border:1px solid #2c92ab;color:#0f7b96;font:12px tahoma;">
		لا يوجد اي تعليق حاليا  </div><br />
		';
  }
if(ulev > 0){
	/*
	CREATE TABLE `comments` (
  `cm_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `cm_active` int NOT NULL
) COMMENT='';
	*/
	
#===================[POST value]=================#
$user = strip_tags($_POST['user']);
$comments = strip_tags($_POST['comments']);
$cm_active = strip_tags($_POST['cm_active']);
$post = $_POST['post'];
#===================[POST value]=================#
if(isset($_POST['addcm'])){
	if(empty($comments)){
		echo"
		<div class='error'>المرجو كتابة التعليق</div><br />
		";
		
		
	} else{
		$Addcm = mysql_query("INSERT INTO comments
		(user,comments,cm_active,post)
		VALUES
		('".uid."','$comments','1','$id')
		
		");
		if(isset($Addcm)){
			echo'
			<div class="success">تم ضافة التعليق بنجاح</div>
			';
			refresh("topic.php?id=".$id."",3);
		}
	}
}

echo'
<form action="topic.php?id='.$id.'" method="POST">
    <div style="margin-bottom:6px;background:#0c93b5;padding:10px 8px;color:#fff;font-size:12px;display:inline-block;">اضافة تعليق</div>

    <div style="background:#fff;border:1px solid #F9F9F9;padding:5px;border-radius:2px;">
        <table width="100%" border="0">
          <tr>
              <td><textarea name="comments" style="width:99%;height:140px;"></textarea></td>
          </tr>
		  <tr>
              <td><input name="addcm" type="submit" value="اضف تعليق"></td>
          </tr>

</table>
</div>
</form>
';
}else{
	echo'
		<div style="padding:13px;background:#92dff2;border:1px solid #2c92ab;color:#0f7b96;font:12px tahoma;">للتعليق في الموقع يتوجب عليك تسجيل الدخول او تسجيل عضوية جديدة</div><br />
		';
}
}else{
	echo'
	<div class="error">لا تملك صلاحيات للدخول الى هدا الرابط - رابط غير موجود</div>
	';
}

include'files/block.php';
include'files/footer.php';
?>