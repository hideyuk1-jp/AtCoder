<?php

// digitDP
// N以下の整数で、ある条件を満たすものの個数を求める場合や
// N以下の整数で、ある条件を満たすものの最大値を求める場合などに使える

// abc007_d
// A以上B以下の整数でいずれかの桁に4か9を含むものの個数を求める問題
list($a, $b) = strs();
echo(countHateNum($b) - countHateNum($a - 1)) . PHP_EOL;
function countHateNum(String $s): int
{
    $l = strlen($s);
    $dp[0][0][0] = 1;
    for ($i = 1; $i <= $l; ++$i) {
        $n = (int)$s[$i - 1];
        foreach ([0, 1] as $smaller) {
            foreach ([0, 1] as $hate_flag) {
                for ($x = 0; $x <= ($smaller ? 9 : $n); ++$x) {
                    $dp[$i][$smaller || $x < $n][$hate_flag || $x === 4 || $x === 9] += ($dp[$i - 1][$smaller][$hate_flag] ?? 0);
                }
            }
        }
    }
    return $dp[$l][0][1] + $dp[$l][1][1];
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
