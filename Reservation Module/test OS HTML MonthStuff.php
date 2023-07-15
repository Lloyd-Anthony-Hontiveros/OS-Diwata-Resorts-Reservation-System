<?php
    Class month {
        public $monthNumber;
        public $monthName;
        public $startDay;
        public $endDay;

        static $count = 1;

        public static function getcount() {
            return self::$count;
        }

        function __construct($monthName, $startDay, $endDay) {
            $this->monthNumber = self::getcount();
            $this->monthName = $monthName;
            $this->startDay = $startDay;
            $this->endDay = $endDay;

            self::$count++;
        }

        //Debug Function
        public function printDate($date) {
            $format = "Date Name: %s <br>
                        Date Number: %d <br>
                        Date Start: %d <br>
                        Date End: %d <br><br>";
            echo sprintf($format, $date->monthNumber, $date->monthName, $date->startDay, $date->endDay);
        }
    }

    $Jan = new month("January", 1, 31);
    $Feb = new month("February", 4, 28);
    $Mar = new month("March", 4, 31);
    $Apr = new month("April", 7, 30);
    $May = new month("May", 2, 31);
    $Jun = new month("June", 5, 30);
    $Jul = new month("July", 7, 31);
    $Aug = new month("August", 2, 31);
    $Sep = new month("September", 6, 30);
    $Oct = new month("October", 1, 31);
    $Nov = new month("November", 4, 30);
    $Dec = new month("December", 6, 31);




?>