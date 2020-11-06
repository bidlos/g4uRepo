<?= 'start'; ?>

<?php
    class Db {
        private static $connect = 1;
        static function dbm()
        {
            return 1;
        }
        public function get()
        {
            return self::dbm();
        }
    }

    $classDb = new Db();

    echo $classDb->get();
?>