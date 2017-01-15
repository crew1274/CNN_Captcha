<?php
include(__DIR__.'/../CaptchaBuilderInterface.php');
include(__DIR__.'/../PhraseBuilderInterface.php');
include(__DIR__.'/../CaptchaBuilder.php');
include(__DIR__.'/../PhraseBuilder.php');


header('Content-type: image/jpeg');

session_start();
use Gregwar\Captcha\CaptchaBuilder;
shell_exec('rm  ../test/*.jpg'); //清除資料
$captcha = new CaptchaBuilder;
$captcha->setBackgroundColor(255, 255, 255)
->setTextColor(0,0,0)
->setMaxBehindLines(0)->setMaxFrontLines(0)->setInterpolation(false)->setDistortion(false)->build();
$label=$captcha->getPhrase();
$captcha->output('../test/'.$label.'.jpg');
$_SESSION['real'] = $captcha->getPhrase();
