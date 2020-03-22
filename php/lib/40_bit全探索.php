<?php
$money = 300;
$item = [["みかん", 100], ["りんご", 200], ["ぶどう", 300]];
$n = count($item);

// bit全探索
for ($i = 0; $i < 2 ** $n; $i++) {
    $bag = [];
    echo ('pattern ' . $i . ': ');
    for ($j = 0; $j < $n; $j++) {
        if (($i >> $j) & 1) {
            $bag[] = $item[$j][0];
        }
    }
    var_dump($bag);
}
