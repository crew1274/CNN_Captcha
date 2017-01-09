<?php

namespace Gregwar\Captcha;

interface PhraseBuilderInterface
{
    /**
     * Generates  random phrase of given length with given charset
     */
    public function build($length, $charset);

    public function niceize($str);

    public function con($str);
}
