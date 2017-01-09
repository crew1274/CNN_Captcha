<?php
include(__DIR__.'/../CaptchaBuilderInterface.php');
include(__DIR__.'/../PhraseBuilderInterface.php');
include(__DIR__.'/../CaptchaBuilder.php');
include(__DIR__.'/../PhraseBuilder.php');
use Gregwar\Captcha\CaptchaBuilder;
echo "產生訓練資料集<br>";
for ( $i=0 ; $i<10; $i++ )
{
$captcha = new CaptchaBuilder;
$captcha->
setBackgroundColor(255, 255,255)->setTextColor(0,0,0)->
setMaxBehindLines(0)->setMaxFrontLines(0)->setInterpolation(false)->setDistortion(false)->build();
    $label=$captcha->getPhrase();
    $captcha->save('temp/'.$i.'.jpg');
echo $label.'<br>';
//label.csv
$a = array();
for ($i=0; $i<$length; $i++) {
    $a[$i] = $string[$i];
}


$list = array (array($label[0],$label[1],$label[2],$label[3]),);
$fp = fopen('label.csv', 'a+');
foreach ($list as $fields) {fputcsv($fp, $fields);}
fclose($fp);

}
