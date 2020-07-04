<?php
$s = str_replace(' ', ',', preg_replace('/\s(?=\s)/', '', trim(fgets(STDIN))));
echo $s . PHP_EOL;
