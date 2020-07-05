<?php
list($n) = ints();
list($s) = strs();
$cnt = 0;
for ($i = 0; $i <= 9; ++$i) {
    $ipos = strpos($s, (string) $i, 0);
    if ($ipos === false) continue;
    for ($j = 0; $j <= 9; ++$j) {
        $jpos = strpos($s, (string) $j, $ipos + 1);
        if ($jpos === false) continue;
        for ($k = 0; $k <= 9; ++$k) {
            $kpos = strpos($s, (string) $k, $jpos + 1);
            if ($kpos !== false) ++$cnt;
        }
    }
}
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
