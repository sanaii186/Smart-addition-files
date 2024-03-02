<?php

//simple add file for ui

function uix_file_type($name){
    $file_extension = pathinfo($name, PATHINFO_EXTENSION);
    return $file_extension;
}

function uix_safe_string($text){
    $special_characters = array('-->', '<!--');
    $safe_string = str_replace($special_characters, '', $text);
    return $safe_string;
}
function uix_simple_add_file(){
    
    $numArgs = func_num_args();
    if ($numArgs > 0) {
        $args = func_get_args();
        foreach ($args as $arg) {
            switch (uix_file_type($arg)) {
                case 'js':
                    echo '<script src="'.$arg.'"></script>'."\n";
                    break;
                case 'css':
                    echo '<link href="'.$arg.'" rel="stylesheet">'."\n";
                    break;
                case 'html':
                    if (file_exists($arg)) {
                        echo file_get_contents($arg);
                        echo "\n";
                    }else{
                        echo "<!--"."uix-alert : file (".uix_safe_string($arg).") not found ."."-->"."\n";
                    }
                    break;
                case 'php':
                    if (file_exists($arg)) {
                        include $arg;
                        echo "\n";
                    }else{
                        echo "<!--"."uix-alert : file (".uix_safe_string($arg).") not found ."."-->"."\n";
                    }
                    break;
                default:
                echo "<!--"."uix-alert : file (".uix_safe_string($arg).") not found ."."-->"."\n";
                break;
            }
        }
    }

}


function uix_getcontent_add_file(){
    
    $numArgs = func_num_args();
    if ($numArgs > 0) {
        $args = func_get_args();
        foreach ($args as $arg) {
            switch (uix_file_type($arg)) {
                case 'js':
                    if (file_exists($arg)) {
                        $contents =  file_get_contents($arg);
                        echo "<script>$contents</script>"."\n";
                        echo "\n";
                    }else{
                        echo "<!--"."uix-alert : file (".uix_safe_string($arg).") not found ."."-->"."\n";
                    }
                    break;
                case 'css':
                    if (file_exists($arg)) {
                        $contents =  file_get_contents($arg);
                        echo "<style>$contents</style>"."\n";
                        echo "\n";
                    }else{
                        echo "<!--"."uix-alert : file (".uix_safe_string($arg).") not found ."."-->"."\n";
                    }
                    break;
                case 'html':
                    if (file_exists($arg)) {
                        echo file_get_contents($arg);
                        echo "\n";
                    }else{
                        echo "<!--"."uix-alert : file (".uix_safe_string($arg).") not found ."."-->"."\n";
                    }
                    break;
                case 'php':
                    if (file_exists($arg)) {
                        include $arg;
                        echo "\n";
                    }else{
                        echo "<!--"."uix-alert : file (".uix_safe_string($arg).") not found ."."-->"."\n";
                    }
                    break;
                default:
                echo "<!--"."uix-alert : file (".uix_safe_string($arg).") not found ."."-->"."\n";
                break;
            }
        }
    }

}