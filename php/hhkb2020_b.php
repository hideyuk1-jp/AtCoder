<?php
list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) list($s[]) = strs();
$cnt = 0;
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if ($s[$i][$j] !== '.') continue;
        if ($i < $h - 1 && $s[$i + 1][$j] === '.') $cnt++;
        if ($j < $w - 1 && $s[$i][$j + 1] === '.') $cnt++;
    }
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
