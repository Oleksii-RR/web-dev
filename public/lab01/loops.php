<?php

echo "<pre>";

echo "Using 'for':\n";

for ($i = 1; $i < 11; $i++) {
    echo "$i\n";
}

echo "\nUsing 'while':\n";

$i = 10;
while ($i > 0) {
    echo "$i\n";

    $i--;
}

echo "</pre>";