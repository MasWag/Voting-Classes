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
     die('<p style="color:red;">学生証番号が不正です。</p>');
   }
   $lines = file( './csv/data.csv' );
   $head = explode( ',', $lines[0] );

$exist = false;
   for($num = 1;$num < count($lines);$num++ ){
     $tmp = explode( ',', $lines[$num] );
     if(!( $tmp[0] - $_POST["id"])){
       $exist = true;
       break;     
     }
   }
if($exist){
echo '<p>登録されている選択科目は以下の通りです。</p><ul style="text-align:left;width:25%;margin-left:auto;margin-right:auto;">';
   $lines[$num] = $_POST["id"];
   for($raw = 1; $raw < count($head);$raw++){
if($tmp[$raw] ==1){
echo '<li>'.str_replace('"', "", $head[$raw]).'</li>';
}}
echo '</ul>';}
else{
echo '<p style="color:red;">Error:登録されていません。</p>';
}

?>
   <address style="text-align:right;"><a href="https://github.com/MasWag/Voting-Classes/wiki">履修報告(Voting Classes)</a><br />tsugarutamenobu@gmail.com</address>
</body>
</html>
