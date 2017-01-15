<?php
include(__DIR__.'/../CaptchaBuilderInterface.php');
include(__DIR__.'/../PhraseBuilderInterface.php');
include(__DIR__.'/../CaptchaBuilder.php');
include(__DIR__.'/../PhraseBuilder.php');
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

shell_exec('rm  train/*.jpg');
shell_exec('rm  train/label.csv');
echo "產生訓練資料集<br>";
for ( $i=0 ; $i< 6400; $i++ )
{
$captcha = new CaptchaBuilder;
$captcha->
setBackgroundColor(255, 255,255)->
setTextColor(0,0,0)->
setMaxBehindLines(0)->setMaxFrontLines(0)->setInterpolation(false)->setDistortion(false)->build();
$label=$captcha->getPhrase();
$captcha->save('train/'.$i.'.jpg');
echo $label.'<br>';
//label.csv generate
$arr=array();
for ($k=0;$k<4 ;$k++)
{
    if ((int)$label[$k])
    {$arr[$k]=(int)$label[$k];}
    else
    {
        $phrase = new PhraseBuilder;
        $arr[$k]=$phrase->con($label[$k]);
    }
}

$list = array ($arr,);
$fp = fopen('train/label.csv', 'a+');
foreach ($list as $fields) {fputcsv($fp, $fields);}
fclose($fp);
}
