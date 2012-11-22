<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" >
   <head>
     <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
   <title>履修報告</title>
   </head>
   <body style="text-align:center">
   <h1>履修報告</h1>
<p style="width:75%;margin-left:auto;margin-right:auto;text-align:left;">以下のフォームに入力して送信してください。これで履修科目の集計を自動で行います。履修している科目がない時間は<em>その他</em>を選んで入力欄は<em>空白</em>にしてください。</p>
   <form action="confirm.php" method="post">
<div id="id">
   <h2>学生証番号(数字のみ)</h2>
   <input type="text" name="id" maxlength="6" />
</div>
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
      echo "<div id=\"$day[1]\">\n";
      for($i = 1;$i<6;$i++){
	echo "<h2>$day[0]曜 $i 限</h2>\n";
	//以下の教科の場合は選択肢はなく、ただ表示されるだけとなります。
       if($t == 0 && $i == 5){
	 echo "ドイツ語\n";
	 echo '<input name="mo5" type="hidden" value="ドイツ語" />';
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
	 echo "数学\n";
	 echo '<input name="tu3" type="hidden" value="数学" />';
	 echo "<input type=\"hidden\" name=\"new_".$day[1].$i."\" value=\"\"/>\n";
	 continue;
       }
       if($t == 2 && $i == 2){
	 echo "英語\n";
	 echo '<input name="we2" type="hidden" value="英語" />';
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
       if($t == 4 && $i == 2){
	 echo "ドイツ語\n";
	 echo '<input name="fr2" type="hidden" value="ドイツ語(石原)" />';
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
     echo "</div>";
   }
?>
<p>
<input type="submit" />
</p>
</form>
<address style="text-align:right;"><a href="https://github.com/MasWag/Voting-Classes/wiki">履修報告</a><br />tsugarutamenobu@gmail.com</address>
 <p style="margin-left:auto;margin-right:0em;text-align:right;">
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
   <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="正当なCSSです!" /></a>
  </p>
</body>
</html>
