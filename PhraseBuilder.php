<?php

namespace Gregwar\Captcha;

class PhraseBuilder implements PhraseBuilderInterface
{
    /**
     * Generates  random phrase of given length with given charset
     */
    public function build($length = 4, $charset = 'abcdefghijklmnpqrstuvwxyz123456789')
    {
        $phrase = '';
        $chars = str_split($charset);

        for ($i = 0; $i < $length; $i++) {
            $phrase .= $chars[array_rand($chars)];
        }

        return $phrase;
    }

    public function niceize($str)
    {
        return strtr(strtolower($str), '01', 'ol');
    }

    public function con($str)
    {
        if ($str== 'a')
        {return 10;}
        elseif ($str== 'b') {
            return 11;
        }
        elseif ($str== 'c') {
            return 12;
        }
        elseif ($str== 'd') {
            return 13;
        }
        elseif ($str== 'e') {
            return 14;
        }
        elseif ($str== 'f') {
            return 15;
        }
        elseif ($str== 'g') {
            return 16;
        }
        elseif ($str== 'h') {
            return 17;
        }
        elseif ($str== 'i') {
            return 18;
        }
        elseif ($str== 'j') {
            return 19;
        }
        elseif ($str== 'k') {
            return 20;
        }
        elseif ($str== 'l') {
            return 21;
        }
        elseif ($str== 'm') {
            return 22;
        }
        elseif ($str== 'n') {
            return 23;
        }
        elseif ($str== 'o') {
            return 24;
        }
        elseif ($str== 'p') {
            return 25;
        }
        elseif ($str== 'q') {
            return 26;
        }
        elseif ($str== 'r') {
            return 27;
        }
        elseif ($str== 's') {
            return 28;
        }
        elseif ($str== 't') {
            return 29;
        }
        elseif ($str== 'u') {
            return 30;
        }
        elseif ($str== 'v') {
            return 31;
        }
        elseif ($str== 'w') {
            return 32;
        }
        elseif ($str== 'x') {
            return 33;
        }
        elseif ($str== 'y') {
            return 34;
        }
        elseif ($str== 'z') {
            return 35;
        }

    }

}
