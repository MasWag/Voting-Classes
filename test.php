<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" >
   <head>
   <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
   <title>理一32組2学期履修集計</title>
<!--   <style>
   body{
 clear:left;
 }
   input{
     right-margin:auto;
     left-margin:auto;
   }
   #mo{
 width:250pt;
 float:left;
 }
   #tu{
 width:250pt;
 float:left;
 }
#we{
 width:250pt;
 float:left;
}
#th{
 width:250pt;
 float:left;
}
#fr{
 width:250pt;
 float:left;
}
</style>
-->
   </head>
   <body style="text-align:center">
   <h1>理一32組2学期履修集計</h1>
<p>以下のフォームに入力して送信してください。これで履修科目の集計を自動で行います。履修している科目がない時間は<em>その他</em>を選んで入力欄は<em>空白</em>にしてください。</p>
   <form action="confirm.php" method="post">
<dvi id="id">
   <h2>学生証番号(数字のみ)</h2>
   <input type="text" name="id" maxlength="6" />
</dvi>
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
       if($t == 0 && $i == 5){
	 echo "ドイツ語(鍛冶)\n";
	 echo '<input name="mo5" type="hidden" value="ドイツ語(鍛冶)" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       if($t == 1 && $i == 2){
	 echo "電磁気学\n";
	 echo '<input name="tu2" type="hidden" value="電磁気学" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       if($t == 1 && $i == 3){
	 echo "数学2\n";
	 echo '<input name="tu3" type="hidden" value="数学2" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       if($t == 1 && $i == 4){
	 echo "数学演習\n";
	 echo '<input name="tu4" type="hidden" value="数学演習" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       if($t == 2 && $i == 2){
	 echo "英語一列\n";
	 echo '<input name="we2" type="hidden" value="英語一列" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       if($t == 2 && $i == 3){
	 echo "実験\n";
	 echo '<input name="we3" type="hidden" value="実験" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       if($t == 2 && $i == 4){
	 echo "実験\n";
	 echo '<input name="we4" type="hidden" value="実験" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       if($t == 3 && $i == 3){
	 echo "英語二列\n";
	 echo '<input name="th3" type="hidden" value="英語二列" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       if($t == 3 && $i == 4){
	 echo "数学1\n";
	 echo '<input name="th4" type="hidden" value="数学1" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       if($t == 4 && $i == 2){
	 echo "ドイツ語(石原)\n";
	 echo '<input name="fr2" type="hidden" value="ドイツ語(石原)" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       if($t == 4 && $i == 3){
	 echo "スポ身\n";
	 echo '<input name="fr3" type="hidden" value="スポ身" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       if($t == 4 && $i == 4){
	 echo "構造化学\n";
	 echo '<input name="fr4" type="hidden" value="構造化学" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       echo "<select name=\"$day[1]$i\">\n";
       echo "<option value=\"\" selected=\"selected\">その他</option>\n";
       $fp = fopen("./csv/$day[1]$i.csv","r");
       while($data = fgetcsv($fp)){
	 echo "<option value=\"$data[0]\">$data[0]</option>\n";
       }
       echo "</select>\n";
       echo "<input type=\"text\" name=\"new_".$day[1].$i."\" />\n";
       fclose($fp);
     }
     echo "</dvi>";
   }
?>
<input type="submit" />
</form>
</body>
</html>
