<?php
    require_once 'models/dependencies.php';
    require_once 'helpers/http.php';
    session_start();

    error_reporting( E_ALL ^ E_STRICT ^ E_DEPRECATED );
    ini_set( 'display_errors', '1' );
    date_default_timezone_set( "Europe/Athens" );
    require_once 'models/assert.php';
    ini_set( 'max_execution_time', 60 );
?>
