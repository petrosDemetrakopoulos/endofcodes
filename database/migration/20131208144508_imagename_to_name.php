<?php
    include 'migrate.php';

    migrate( 
        array( 
            'ALTER TABLE
                images
            DROP COLUMN
                imagename',
            "ALTER TABLE
                images
            ADD COLUMN
                `name` text COLLATE utf8mb4_unicode_ci NOT NULL"
        ) 
    );
?>
