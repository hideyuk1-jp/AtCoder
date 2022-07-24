<?php

// 下3桁が8の倍数であれば8の倍数
[$S] = strs();
$s = count_chars($S);
$ans = 'No';

// 2桁以下の場合
if (strlen($S) <= 2) {
    $n = 0;
    while ($n < 100) {
        $n += 8;
        if ($s == count_chars($n)) {
            $ans = 'Yes';
        }
    }
    echo $ans . PHP_EOL;
    exit();
}

// 3桁以上の場合
$n = 96;
while ($n < 1000) {
    $n += 8;
    $flag = true;
    $cn = count_chars($n);
    foreach ($cn as $i => $c) {
        if ($s[$i] < $c) {
            $flag = false;
            break;
        }
    }
    if ($flag) {
        $ans = 'Yes';
        break;
    }
}
echo $ans . PHP_EOL;

function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
