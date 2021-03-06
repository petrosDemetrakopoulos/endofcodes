<?php
    class TestTest extends UnitTest {
        public function testFindAllFindsFilesInFolders() {
            $path = 'mock/depth1/depth2/depth3/';
            mkdir( 'tests/' . $path, 0777, true );
            file_put_contents( 'tests/' . $path . 'magic.php', '' );

            $tests = UnitTest::findAll();

            $this->assertTrue( array_search( $path . 'magic', $tests ) !== false, 'findAll() must find tests in subfolders' );
        }
        protected function rrmdir( $dir ) {
            if ( is_dir( $dir ) ) {
                $objects = scandir( $dir );
                foreach ( $objects as $object ) {
                    if ( $object != "." && $object != ".." ) {
                        if ( filetype( $dir . "/" . $object ) == "dir" ) {
                            $this->rrmdir( $dir . "/" . $object );
                        }
                        else {
                            unlink( $dir . "/" . $object );
                        }
                    }
                }
                rmdir( $dir );
            }
        }
        public function tearDown() {
            $this->rrmdir( 'tests/mock' );
        }
    }
    return new TestTest();
?>
