<?php
require 'vendor/autoload.php';

use App\CustomDateTime;

try {
    $dateTime1 = new CustomDateTime(2060, 10, 10);
    $dateTime2 = new CustomDateTime(2060, 10, 10);
    $dateTime1->compare($dateTime2);
} catch (Exception $exception) {
    echo $exception->getMessage();
}

