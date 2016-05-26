<?php

// Inclut automatiquement tous les packages de Composer

require_once __DIR__.'/vendor/autoload.php';

use Whatsma\ZodiacSign;

$calculator = new ZodiacSign\Calculator();



try {
  $zodiacSign = $calculator->calculate(17,8);
  echo $zodiacSign . "\n";
} catch (ZodiacSign\InvalidDayException $e) {
  echo "ERROR: Invalid Day";
} catch (ZodiacSign\InvalidMonthException $e) {
  echo "ERROR: Invalid Month";
}