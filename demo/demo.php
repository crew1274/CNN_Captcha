<?php
include(__DIR__.'/../CaptchaBuilderInterface.php');
include(__DIR__.'/../PhraseBuilderInterface.php');
include(__DIR__.'/../CaptchaBuilder.php');
include(__DIR__.'/../PhraseBuilder.php');
use Gregwar\Captcha\CaptchaBuilder;
$captcha = new CaptchaBuilder;
$captcha
->setBackgroundColor(255, 255, 255)->setMaxBehindLines(0)
->setMaxFrontLines(0)->setInterpolation(false)->setDistortion(false)->build();
    $test=$captcha->getPhrase();
    $captcha->save('temp/'.$test.'.jpg');
echo $captcha->getPhrase();

;
