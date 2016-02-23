<?php

function exclude(){
    $url=substr($_SERVER['REQUEST_URI'],-1)=='/' ? false:true;
    if ($url==true) {
        return header('Location: ./');
    }
}