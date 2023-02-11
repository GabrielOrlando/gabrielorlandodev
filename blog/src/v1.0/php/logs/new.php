<?php
function logMsg( $msg, $level, $caminho ){
    $levelStr = '';

    switch ( $level ){
        case 'info':
            $levelStr = 'INFO';
            break;
 
        case 'warning':
            $levelStr = 'WARNING';
            break;
 
        case 'error':
            $levelStr = 'ERROR';
            break;
    }

    $date = date( 'Y-m-d H:i:s' );
    $msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL );

    file_put_contents( $caminho . date('Y-m-d') . '.log', $msg, FILE_APPEND );
}
?>