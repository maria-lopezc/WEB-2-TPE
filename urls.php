<?php

function baseurl(){
    $base="http://localhost/";
    $path=dirname(__FILE__);
    $pieces = explode(DIRECTORY_SEPARATOR, $path);
    $base=$base.$pieces[count($pieces) - 1]."/";
    return $base;
}