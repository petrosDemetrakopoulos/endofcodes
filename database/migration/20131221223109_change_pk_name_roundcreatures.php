<?php
    require_once 'migrate.php';

    Migration::dropPrimaryKey( 'roundcreatures' );
    Migration::addPrimaryKey( 'roundcreatures', 'pk_roundcreatures', [ 'gameid', 'roundid', 'creatureid' ] );
?>
