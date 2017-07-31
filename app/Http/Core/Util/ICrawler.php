<?php
/**
 * Created by PhpStorm.
 * User: huytt
 * Date: 5/17/2017
 * Time: 2:58 PM
 */

namespace App\Http\Core\Util;

interface ICrawler
{
    public function getProductSpecific($url);
}