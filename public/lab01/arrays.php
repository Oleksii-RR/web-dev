<?php

$student["name"] = "Oleksii";
$student["surname"] = "Rudyi";
$student["age"] = 20;
$student["specialty"] = "Developer";

echo "<pre>";

echo "Initial array:\n";

foreach ($student as $key => $value) {
    echo "$key: $value\n";
}

echo "\nNew field 'average_grade':\n";
$student["average_grade"] = 4;

foreach ($student as $key => $value) {
    echo "$key: $value\n";
}

echo "</pre>";