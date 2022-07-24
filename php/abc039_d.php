<?php

list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) {
    list($s[]) = strs();
}
for ($i = 0; $i < $h; ++$i) {
    $ss[] = str_repeat('#', $w);
}
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if ($s[$i][$j] === '#') {
            continue;
        }
        setWhite($i, $j);
    }
}
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if ($s[$i][$j] === '#' && !checkBlack($i, $j)) {
            exit('impossible');
        }
    }
}
echo 'possible' . PHP_EOL;
echo implode(PHP_EOL, $ss);
function setWhite($i, $j)
{
    global $ss, $h, $w;
    for ($ii = max(0, $i - 1); $ii <= min($h - 1, $i + 1); ++$ii) {
        for ($jj = max(0, $j - 1); $jj <= min($w - 1, $j + 1); ++$jj) {
            $ss[$ii][$jj] = '.';
        }
    }
}
function checkBlack($i, $j)
{
    global $ss, $h, $w;
    for ($ii = max(0, $i - 1); $ii <= min($h - 1, $i + 1); ++$ii) {
        for ($jj = max(0, $j - 1); $jj <= min($w - 1, $j + 1); ++$jj) {
            if ($ss[$ii][$jj] === '#') {
                return true;
            }
        }
    }
    return false;
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
