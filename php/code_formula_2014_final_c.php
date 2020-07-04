<?php
$s = trim(fgets(STDIN));
preg_match_all('/@([a-z]+)/', $s, $m);
$m = array_unique($m[1]);
sort($m, SORT_STRING);
echo implode(PHP_EOL, $m);
