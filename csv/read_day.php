<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" >
   <head>
     <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
   <title>理一32組2学期履修集計</title>
   </head>
   <body style="text-align:center">
   <h1>理一32組2学期履修集計</h1>
   <p>this is read_day.</p>
<?php
    for($t = 0;$t<5;$t++){
      switch($t){
      case 0:
      $day[0] = "月";
      $day[1] = "mo";
      break;
      case 1:
      $day[0] = "火";
      $day[1] = "tu";
      break;
      case 2:
      $day[0] = "水";
      $day[1] = "we";
      break;
      case 3:
      $day[0] = "木";
      $day[1] = "th";
      break;
      case 4:
      $day[0] = "金";
      $day[1] = "fr";
      break;
      }
      echo "<dvi id=\"$day[1]\">\n";
      for($i = 1;$i<6;$i++){
	echo "<h2>$day[0]曜 $i 限</h2>\n";
       $fp = fopen("./$day[1]$i.csv","r");
       echo "<ul>\n";
       while($data = fgetcsv($fp)){
	 echo "<li>$data[0]</li>\n";
       }
       echo "</ul>\n";
       fclose($fp);
     }
     echo "</dvi>";
   }
?>
</body>
</html>
