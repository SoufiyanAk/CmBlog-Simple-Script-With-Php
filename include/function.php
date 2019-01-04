<?

function refresh($page,$sec){
	
	echo"
		<meta http-equiv='refresh' content='".$sec."; url=".$page."' />
		";
	
	
}



function ago($time)
{
   $periods = array("ثانية", "دقيقة", "ساعة", "يوم", "اسبوع", "شهر", "سنة", "عقد");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

       $difference     = $now - $time;
       $tense         = "مضت";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);

   if($difference != 1) {
       $periods[$j].= "";
   }

   return "$difference $periods[$j]  ";
}

?>