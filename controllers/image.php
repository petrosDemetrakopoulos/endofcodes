<?php
    class ImageController {
        public static function create( $image ) {
            include_once 'models/image.php';
            include_once 'models/extentions.php';
            if ( !isset( $_SESSION[ 'user' ][ 'username' ] ) ) {
                throw new HTTPUnauthorizedException();
            }
            $config = getConfig();
            global $config;
            $name = $image[ 'name' ];
            $tmp_name = $image[ 'tmp_name' ];
            $user = User::find_by_username( $_SESSION[ 'user' ][ 'username' ] );
            $image = new Image();
            $image->tmp_name = $tmp_name;
            $image->name = $name;
            $image->user = $user;
            try {
                $image->save();
            }
            catch ( ModelValidationException $e ) {
                go( 'user', 'update', array( 'username' => $user->username, $e->error => true ) );
            }
            go( 'user', 'view', array( 'username' => $user->username ) );
        }
    }
?>
