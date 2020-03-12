<?php

namespace app\src;

class Redirect{

    public static function redirect($target){
        return header("location:{$target}");
    }

    public static function back(){
        $previous = "javascript:history.go(-1)";
        // $previous = "javascript:history.back()";

        if (isset($_SESSION["HTTP_REFERER"])){
            $previous = $_SESSION["HTTP_REFEREAR"];
        }

        return header("location:{$previous}");
    }
}