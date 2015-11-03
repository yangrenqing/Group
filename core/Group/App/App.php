<?php
namespace core\Group\App;

use Exception;

class App
{
    public static function checkPath()
    {
        self::setIsCgi();
        self::setPhpFile();
        self::setRoot();
    }

    private static function setIsCgi()
    {
        if(!defined('IS_CGI')) {
            define('IS_CGI',(0 === strpos(PHP_SAPI,'cgi') || false !== strpos(PHP_SAPI,'fcgi')) ? 1 : 0 );
        }

    }

    private static function setPhpFile()
    {
        if(!defined('_PHP_FILE_')) {
            if(IS_CGI) {
                $_temp  = explode('.php',$_SERVER['PHP_SELF']);
                define('_PHP_FILE_',    rtrim(str_replace($_SERVER['HTTP_HOST'],'',$_temp[0].'.php'),'/'));
            }else {
                define('_PHP_FILE_',    rtrim($_SERVER['SCRIPT_NAME'],'/'));
            }
        }
    }

    private static function setRoot()
    {
        $_root = rtrim(dirname(_PHP_FILE_),'/');
        if(!defined('__ROOT__')) {
            define('__ROOT__',  (($_root=='/' || $_root=='\\')?'':$_root));
        }
    }

}