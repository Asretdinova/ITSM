<?php

/**

 * Date: 10/2/19
 * Time: 3:08 AM
 */

namespace idea\helpers;

class GeneralHelper
{
    public static function makeIconFromText($string)
    {
        return "<div class='author_image'><span>".mb_substr($string, 0, 1)."</span></div>";
    }
}