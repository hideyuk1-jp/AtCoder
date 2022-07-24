<?php

list($s) = strs();
$n = strlen($s);
$kai = [];
for ($i = 0; $i < intdiv($n, 2) + $n % 2; ++$i) {
    if ($s[$i] === $s[$n - 1 - $i]) {
        $kai[$i] = true;
    }
}
$cntkai = count($kai);
$cnt = 0;
for ($i = 0; $i < intdiv($n, 2) + $n % 2; ++$i) {
    $m = 2;
    if ($n % 2 && $i === intdiv($n, 2) + $n % 2 - 1) {
        $m = 1;
    }
    if (isset($kai[$i])) { // 1文字が回文の条件を満たしている場合
        if ($n % 2 && $i === intdiv($n, 2) + $n % 2 - 1) { // 文字数が奇数の時の中心の文字の場合
            if ($cntkai < intdiv($n, 2) + $n % 2) {
                // 他の文字のいずれかが回文の条件を満たしていない場合
                $cnt += 25;
            }
        } else {
            $cnt += 25 * 2;
        }
    } else { // 1文字が回文の条件を満たしていない場合
        if ($cntkai === intdiv($n, 2) + $n % 2 - 1) { // 他の文字が全て回文の条件を満たしている場合
            $cnt += 24 * $m;
        } else { // 他の文字のいずれかが回文の条件を満たしていない場合
            $cnt += 25 * $m;
        }
    }
}
echo $cnt . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
