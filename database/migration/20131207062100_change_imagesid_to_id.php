<?php
    require_once 'migrate.php';

    Migration::alterField( 'images', 'imageid', 'id', 'INT( 11 ) NOT NULL AUTO_INCREMENT' );
?>
