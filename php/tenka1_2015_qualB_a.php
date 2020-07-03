<?php
$a = [100, 100, 200];
for ($i = 3; $i < 20; ++$i)
    $a[$i] = $a[$i - 1] + $a[$i - 2] + $a[$i - 3];
echo $a[19] . PHP_EOL;
