<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" >
   <head>
   <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
   <title>履修報告(Voting Classes)</title>
   </head>
   <body style="text-align:center">
   <h1>履修報告(Voting Classes)</h1>
<?php
   if($_POST["id"] == 0){
     die('<p style="color:red;">学生証番号が不正です。前のページに戻って修正してください。</p>');
   }
   //まずは各時限ごとのcsvの書き込みを行う
   $new_lines = "";
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
     for($i=1;$i<=5;$i++){
       if( $_POST["new_$day$i"] ){
	 $fp = fopen("./csv/$day$i.csv","r");
	 while($data = fgetcsv($fp)){
	   if ( str_replace('"', "", $data[0]) == $_POST["$day$i"] ){
	     continue 2;
	   }
	 }
	 fclose($fp);
	 if( $handle = fopen( "./csv/$day$i.csv", 'a' ) ){
	   fwrite( $handle, '"'.$_POST["$day$i"].'"'."\n" );
	   $new_lines .= ",".'"'.$_POST["$day$i"].'"';
	 }
	 else {
	   die("<p>./csv/$day$i.csv opening error.<br />すみませんがエラーが発生しました。エラーメッセージとともに管理者に連絡してください。</p><address>foo@bar.com</address>");
	 }
       }
     }
   }
if($new_lines != "") $new_lines .= ',"dummy"';

   //ここからdata.csvの書き込み
   $lines = file( './csv/data.csv' );
   $lines[0] .= $new_lines;
   $head = explode( ',', $lines[0] );

   for($num = 1;$num < count($lines);$num++ ){
     $tmp = explode( ',', $lines[$num] );
     if(!( $tmp[0] - $_POST["id"])){
       break;     
     }
   }
   $lines[$num] = $_POST["id"];
   for($raw = 1; $raw < count($head);$raw++){
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
       for($i=1;$i<=5;$i++){
//echo 'head is'.str_replace('"', "", $head[$raw]).'<br>Post is'.$_POST[$day.$i].'<br>';
	 if(str_replace('"', "", $head[$raw]) == $_POST[$day.$i]){
//	   echo 'matched!<br>';
$lines[$num] .=",1";
	   continue 3;
	 }
//else
//	   echo 'not matched!<br>';
       }
     }
     $lines[$num] .=",0";
   }

if( $fp = fopen("./csv/data.csv","w") ){
  foreach( $lines as $line ){  //ファイルに書き出す
    $line = str_replace("\n", "", $line);
    fwrite( $fp, $line."\n" );
  }
}
else {
  die("<p>./csv/data.csv opening error.<br />すみませんがエラーが発生しました。エラーメッセージとともに管理者に連絡してください。</p><address>foo@bar.com</address>");
}

fclose($fp);
echo "<p style=\"width:50%;text-align:left;margin-left:auto;margin-right:auto;\">履修科目の報告ありがとうございました。訂正する場合はもう一度同じように入力してください。</p>";
echo "   <address style="text-align:right;"><a href="https://github.com/MasWag/Voting-Classes/wiki">履修報告(Voting Classes)</a><br />tsugarutamenobu@gmail.com</address>";
?>
</body>
</html>
