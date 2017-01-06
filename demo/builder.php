<?php
include(__DIR__.'/../CaptchaBuilderInterface.php');
include(__DIR__.'/../PhraseBuilderInterface.php');
include(__DIR__.'/../CaptchaBuilder.php');
include(__DIR__.'/../PhraseBuilder.php');
use Gregwar\Captcha\CaptchaBuilder;
for ( $i=0 ; $i<10; $i++ )
{
$captcha = new CaptchaBuilder;
$captcha->
setBackgroundColor(255, 255,255)->
setMaxBehindLines(0)->setMaxFrontLines(0)->setInterpolation(false)->setDistortion(false)->build();
    $label=$captcha->getPhrase();
    $captcha->save('temp/'.$label.'.jpg');
echo $label.'<br>';
}
