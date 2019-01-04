 <?
include("../include/config.php");
$ads = mysql_query("CREATE TABLE `ads` (
  `active1` int(11) NOT NULL,
  `active2` int(11) NOT NULL,
  `code1` text NOT NULL,
  `code2` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
");

$ads = mysql_query("INSERT INTO `ads` VALUES (1, 1, 'كود الاعلان الاول', 'كود الاعلان التاني', 'cmblog');
");


$block=mysql_query("CREATE TABLE `block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `ord` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

");

$category = mysql_query
 ("
CREATE TABLE `category` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_title` varchar(255) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
"); 
$category = mysql_query
 ("INSERT INTO `category` VALUES (1, 'ستايلات');
"); 
$comments = mysql_query("CREATE TABLE `comments` (
  `cm_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `cm_active` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  PRIMARY KEY (`cm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

");

$config = mysql_query("CREATE TABLE `config` (
  `c_name` varchar(255) NOT NULL,
  `c_url` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_desc` text NOT NULL,
  `c_key` text NOT NULL,
  `c_close` int(11) NOT NULL,
  `c_close_text` text NOT NULL,
  `c_copy` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
$config = mysql_query("INSERT INTO `config` VALUES ('سكربت cmblog', 'localhost', 'admin@site.com', 'سكربت مدونة عربية مجانية و ستبقى كدالك', 'سكربت,بلوجر', 0, 'عدرا الموقع مغلق حاليا للصيانة.', 'جميع الحقوق محفوضة لسكربت cmblog');");

$posts = mysql_query("CREATE TABLE `posts` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(255) NOT NULL,
  `p_pic` blob NOT NULL,
  `p_sub` longtext NOT NULL,
  `p_time` varchar(255) NOT NULL,
  `p_user` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;");

$posts = mysql_query("INSERT INTO `posts` VALUES (1, 'شكرا لتحميلك النسخة التانية من سكربت CmBlog v.2', 0x687474703a2f2f6c6f63616c686f73742f696d616765732f6c6f676f2e706e67, 'شكرا لتحميلك النسخة التانية من سكربت CmBlog v.2
ان احتجت أي مساعدة لا تتردد في مراسلة الدعم الفني للسكربت عبر الرابط التالي www.cm-blog.com للتواصل معي عبر فايسبوك
www.facebook.com/comix.h', '1422217720', 1, 1, 1);
");
$user = mysql_query("CREATE TABLE `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_lev` int(11) NOT NULL,
  `u_img` varchar(255) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
");


if ($ads) {
echo"
		<div class='success'>تتم تتبيت قاعدة ads</div><br />
		";
}

 else {
echo"
		<div class='error'>حدت خطا في تتبيت قاعدة بيانات ads</div><br />
		";
     };

if ($block) {
echo"
		<div class='success'>تتم تتبيت قاعدة block</div><br />
		";
}

else {
echo"
		<div class='error'>حدت خطا في تتبيت قاعدة بيانات block</div><br />
		";
};

if ($category) {
echo"
		<div class='success'>تتم تتبيت قاعدة category</div><br />
		";                                      
} 

else {
echo"
		<div class='error'>لم تتم تتبيت قاعدة بيانات category</div><br />
		";
};

if ($comments) {                                                                                         
echo"
		<div class='success'>تتم تتبيت قاعدة comments</div><br />
		";
}                                                                             
                        
else {                                                                                                
echo"
		<div class='error'>لم تتم تتبيت قاعدة بيانات comments</div><br />
		";                                                               };

if ($config) {                                                                                         
echo"
		<div class='success'>تتم تتبيت قاعدة config</div><br />
		";
}                                                                             
                        
else {                                                                                                
echo"
		<div class='error'>حدت خطا في تتبيت قاعدة بيانات config</div><br />
		";                                                           };
if ($posts) {                                                                                         
echo"
		<div class='success'>تتم تتبيت قاعدة posts</div><br />
		";
}                                                                             
                        
else {                                                                                                
echo"
		<div class='error'>حدت خطا في تتبيت قاعدة بيانات posts</div><br />
		";                                                                    };
if ($user) {                                                                                         
echo"
		<div class='success'>تتم تتبيت قاعدة user</div><br />
		";
}                                                                             
                        
else {                                                                                                
echo"
		<div class='error'>حدت خطا في تتبيت قاعدة بيانات user</div><br />
		";                                                       };


?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<title>صفحة تتبيت سكربت cmblog</title>
<table width="10%" border="0">
<tr>
<td><a href="../install/register.php"><button class="grb">التالي</button></a></td>
</tr>