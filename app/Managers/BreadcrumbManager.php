<?php


namespace Birch\Managers;

use Illuminate\Support\Facades\Route;

class BreadcrumbManager
{

    //return "<ol class=\"breadcrumb\">" . self::getHtml(\Request::route()->getName(),'',true) . "</ol>";

    public static function getHtml($route,$current,$active = false){

        $params = self::getParams($route);

        if($active){
            $me = "<li class=\"active\">" . self::getName($route) . "</li>";
        }else{
            $me = "<li><a href=\"" . route($route,Route::current()->getParameter($params[0])) . "\">" . self::getName($route) . "</a></li>";

        }


        if(self::hasParent($route)){
            return self::getHtml(self::getParent($route),$me  . $current);
        }else{
            return $me  . $current;
        }

    }

    private static function hasParent($route){
        return self::getParent($route) != "0";
    }

    private static function getParent($route){
        return self::getDetails($route)['parent'];
    }

    public static function getName($route){
        return self::getDetails($route)['title'];
    }

    public static function getDetails($route){
        return config('admin.pages')[$route];
    }

    public static function getParams($route){
        return null;

    }
}