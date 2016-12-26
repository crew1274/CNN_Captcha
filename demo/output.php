<?php
include(__DIR__.'/../CaptchaBuilderInterface.php');
include(__DIR__.'/../PhraseBuilderInterface.php');
include(__DIR__.'/../CaptchaBuilder.php');
include(__DIR__.'/../PhraseBuilder.php');


header('Content-type: image/jpeg');

session_start();
use Gregwar\Captcha\CaptchaBuilder;
$captcha = new CaptchaBuilder;
$captcha->setBackgroundColor(255, 255, 255)->setMaxBehindLines(0)
    ->setMaxFrontLines(0)->setInterpolation(false)->setDistortion(false)->build()
    ->output();


$_SESSION['real'] = $captcha->getPhrase();

;
