<?php
list($n) = ints();
for ($i = 0; $i < $n; $i++) {
    list($s[]) = strs();
}
for ($i = 0; $i < $n; $i++) {
    if (isset($a[$s[$i][0]])) $a[$s[$i][0]]++;
    else $a[$s[$i][0]] = 1;
}
$m = ['M', 'A', 'R', 'C', 'H'];
$cnt = 0;
for ($i = 0; $i < 3; $i++) {
    for ($j = $i + 1; $j < 4; $j++) {
        for ($k = $j + 1; $k < 5; $k++) {
            $cnt += ($a[$m[$i]] ?? 0) * ($a[$m[$j]] ?? 0) * ($a[$m[$k]] ?? 0);
        }
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
