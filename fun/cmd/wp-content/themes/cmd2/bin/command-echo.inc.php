<?php
/*
echo
@@
Displays messages, or turns command-echoing on or off.

ECHO [ON | OFF]
ECHO [message]

Type ECHO without parameters to display the current echo setting.
@@
*/

if($stdin){
        e('<p>'.$stdin.'</p>');
}else{
        if($params{0} == '$'){
                $v=substr($params,1);
                e('<p>'.$v.' = '.$_SESSION[$v].'</p>');
        }else{
                e('<p>'.$params.'</p>');
        }
}
?>
