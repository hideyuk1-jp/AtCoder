<?php
list($q) = ints();
$strs = [];
$top = 0;
for ($i = 0; $i < $q; ++$i) {
    list($type, $a, $b) = strs();
    if ($type === '1') {
        $strs[] = [$a, (int)$b];
    } elseif ($type === '2') {
        $x = (int)$a;
        $cnt = [];
        for ($j = 0; $j < 26; ++$j) $cnt[chr(97 + $j)] = 0;
        while ($x > 0 && $top < count($strs)) {
            list($c, $n) = $strs[$top];
            if ($x >= $n) {
                $cnt[$c] += $n;
                ++$top;
                $x -= $n;
            } else {
                $cnt[$c] += $x;
                $strs[$top][1] -= $x;
                break;
            }
        }
        $res = 0;
        foreach ($cnt as $v) $res += $v ** 2;
        $ans[] = $res;
    }
}
echo implode(PHP_EOL, $ans);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
