<?= 'start'; ?>

<?php
    class Db {
        private static $connect = 1;
        static function dbm()
        {
            return 1;
        }
        public static function get()
        {
            return self::dbm();
        }
    }

    echo Db::get();
?>