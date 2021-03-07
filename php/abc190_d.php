<?php
[$N] = ints();
$divisors = divisors(2 * $N);
$cnt = 0;
foreach ($divisors as $d) {
    if (abs($N - ($d % 2 ? 0 : $d / 2)) % $d === 0) ++$cnt;
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
// 約数列挙
function divisors($max)
{
    $arr = [];
    $rmax = (int) floor(sqrt($max));
    for ($i = 1; $i <= $rmax; $i++) {
        if ($max % $i === 0) {
            $arr[] = $i;
            $arr[] = $max / $i;
        }
    }
    sort($arr);
    return array_unique($arr);
}
