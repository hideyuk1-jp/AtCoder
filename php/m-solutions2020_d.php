<?php

list($n) = ints();
$a = ints();
$money = 1000;
$kabu = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($i < $n - 1 && $a[$i + 1] > $a[$i]) { // 買えるだけ買う
        $kabu += intdiv($money, $a[$i]);
        $money -= $a[$i] * intdiv($money, $a[$i]);
    } else { //売れるだけ売る
        $money += $kabu * $a[$i];
        $kabu = 0;
    }
}
echo $money;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
