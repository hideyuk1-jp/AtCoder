<?php

fscanf(STDIN, '%s', $s);

$_s = floor(sqrt($s));
for ($i = $_s; $i >= 1; $i--) {
    if ($s % $i === 0) {
        break;
    }
}
echo $i . ' * ' . ($s / $i) . PHP_EOL;
