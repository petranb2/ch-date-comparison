<?php
require 'vendor/autoload.php';

use App\CustomDateTime;

try {
    $dateTime1 = new CustomDateTime(2021, 5, 5);
    $dateTime2 = new CustomDateTime(2020, 6, 5);
    $dateTime1->compare($dateTime2);
} catch (Exception $exception) {
    echo $exception->getMessage();
}

