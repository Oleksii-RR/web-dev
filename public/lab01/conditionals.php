<?php

$randomVar = rand(-100, 100);

echo "<pre>";

echo "Random number: $randomVar\n";

if ($randomVar % 2 == 0) {
    echo "The number is even\n";
} else {
    echo "The number is uneven\n";
}

echo "</pre>";