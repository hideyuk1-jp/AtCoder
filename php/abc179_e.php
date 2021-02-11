<?php
const DEBUG = false;
[$N, $X, $M] = ints();
$a = $X;
$ans = 0;
for ($i = 0; $i < $N; ++$i) {
    if (DEBUG) echo "i=${i}: ${a} ${ans}" . PHP_EOL;
    if (isset($exits[$a])) {
        // ループ区間発見
        if (DEBUG) echo '[loop is found]' . PHP_EOL;
        $li = $i - $exits[$a][0];
        $ld = $ans - $exits[$a][1];
        $ln = intdiv($N - 1 - $i, $li);
        $ans += $ld * $ln;
        $i += $li * $ln - 1;
        $exits = [];
        continue;
    } else {
        $exits[$a] = [$i, $ans];
    }
    $ans += $a;
    $a = ($a ** 2) % $M;
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
