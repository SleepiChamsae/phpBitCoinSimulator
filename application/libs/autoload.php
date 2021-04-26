<?php 
    spl_autoload_register(function ($path)
    {
        $path=str_replace('\\','/',$path);

        $paths=explode('/', $path);

        if (preg_match('/model/', strtolower($paths[1]))) {
            $className = 'models';
        } else if (preg_match('/controller/', strtolower($paths[1]))) {
            $className = 'controllers';
        } else if (preg_match('/view/', strtolower($paths[1]))) {
            $className = 'views';
        } else {
            $className = 'libs'; 
        }

        $loadpath = $paths[0].'/'.$className.'/'.$paths[2].'.php';
        echo 'autoload $path :'.$loadpath.'<br>';

        if(!file_exists($loadpath)) {
            echo "--autoload: file not found ($loadpath)";
            exit();
        }
        require_once $loadpath;
    });

?>