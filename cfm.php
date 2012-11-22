<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" >
   <head>
     <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
   <title>履修報告</title>
   </head>
   <body style="text-align:center">
   <h1>履修報告</h1>
   <form action="action.php" method="post">
     <dvi id="id">
       <h2>学生証番号(数字のみ)</h2>
       <?php 
   if($_POST["id"] > 240000){
     echo htmlspecialchars($_POST["id"]);
     echo '<input type="hidden" name="id" value='.$_POST["id"]." />\n";
   }
   else{
     echo '<p><strong style="color:red;">学生証番号が不正です。前のページに戻って修正してください。</strong></p>';
     echo '<input type="hidden" name="id" value="0"'."/>\n";
   }
?>
</dvi>
<table style="margin-right:auto;margin-left:auto;" >
<tr><th></th><th>月曜</th><th>火曜</th><th>水曜</th><th>木曜</th><th>金曜</th></tr>
<?php 
    for($i=1;$i<=5;$i++){
      echo "<tr><th>".$i."限</th>\n";
      for($t=0;$t<5;$t++){
	switch($t){
	case 0:
	  $day = "mo";
	  break;
	case 1:
	  $day = "tu";
	  break;
	case 2:
	  $day = "we";
	  break;
	case 3:
	  $day = "th";
	  break;
	case 4:
	  $day = "fr";
	  break;
	}	
	echo "<td>";
	if($_POST[$day.$i] || !$_POST["new_".$day.$i]){
	  echo htmlspecialchars($_POST[$day.$i]);
	  echo '<input type="hidden" name="'.$day.$i.'" value="'.$_POST[$day.$i]."\" />\n";
	  echo '<input type="hidden" name="new_'.$day.$i."\" value=\"\" />\n";
	}
	else{
	  echo htmlspecialchars($_POST["new_".$day.$i]);
	  echo '<input type="hidden" name="'.$day.$i.'" value="'.$_POST['new_'.$day.$i]."\" />\n";
$nicht_neu = false;
	  $fp = fopen("./csv/".$day.$i.".csv","r");
	  while($data = fgetcsv($fp)){
	    if ( $data[0] == $_POST["new_".$day.$i] ){
	  echo '<input type="hidden" name="new_'.$day.$i."\" value=\"\" />\n";
$nicht_neu = true;
break;
	    }
	  }
	  fclose($fp);
if(!$nicht_neu){
	  echo '<input type="hidden" name="new_'.$day.$i."\" value=\"true\" />\n";
	}
	}
	echo "</td>\n";
      }
      echo "</tr>\n";
    }

?>
</table>
<p>これで正しいですか？正しければ送信してください。正しくなければ前のページに戻って修正してください。</p>
<input type="submit" />
</form>
<address style="text-align:right;"><a href="https://github.com/MasWag/Voting-Classes/wiki">履修報告</a><br />tsugarutamenobu@gmail.com</address>
</body>
</html>
