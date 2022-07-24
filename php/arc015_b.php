<?php

list($n) = ints();
foreach (['moushobi', 'manatsubi', 'natsubi', 'nettaiya', 'huyubi', 'mahuyubi'] as $v) {
    $cnt[$v] = 0;
}
for ($i = 0; $i < $n; ++$i) {
    list($max, $min) = strs();
    if (strpos($max, '.') !== false) {
        $max = (int) str_replace('.', '', $max);
    } else {
        $max *= 10;
    }
    if (strpos($min, '.') !== false) {
        $min = (int) str_replace('.', '', $min);
    } else {
        $min *= 10;
    }
    if ($max >= 350) {
        ++$cnt['moushobi'];
    }
    if ($max >= 300 && $max < 350) {
        ++$cnt['manatsubi'];
    }
    if ($max >= 250 && $max < 300) {
        ++$cnt['natsubi'];
    }
    if ($min >= 250) {
        ++$cnt['nettaiya'];
    }
    if ($min < 0 && $max >= 0) {
        ++$cnt['huyubi'];
    }
    if ($max < 0) {
        ++$cnt['mahuyubi'];
    }
}
echo implode(' ', $cnt) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
