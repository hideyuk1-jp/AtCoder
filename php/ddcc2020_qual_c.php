<?php

list($h, $w, $k) = ints();
$cnt = 1;
for ($i = 0; $i < $h; ++$i) {
    list($s) = strs();
    $t[$i] = [];
    $pos = 0;
    $npos = strpos($s, '#', $pos);
    while ($npos !== false) {
        $t[$i] = array_merge($t[$i], array_fill(0, $npos - $pos + 1, $cnt));
        $pos = $npos + 1;
        $npos = strpos($s, '#', $pos);
        if ($npos === false) {
            $t[$i] = array_merge($t[$i], array_fill(0, $w - 1 - $pos + 1, $cnt));
        }
        $cnt++;
    }
}
for ($i = 0; $i < $h - 1; ++$i) {
    if (count($t[$i + 1]) === 0) {
        $t[$i + 1] = $t[$i];
    }
}
for ($i = $h - 1; $i >= 1; --$i) {
    if (count($t[$i - 1]) === 0) {
        $t[$i - 1] = $t[$i];
    }
}
for ($i = 0; $i < $h; ++$i) {
    echo implode(' ', $t[$i]) . PHP_EOL;
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
