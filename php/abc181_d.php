<?php
// 下3桁が8の倍数であれば8の倍数
[$S] = strs();
$s = count_chars($S);
// 3桁以下の場合
if (strlen($S) <= 3) {
    $n = 0;
    $ans = 'No';
    while ($n < 1000) {
        $n += 8;
        if ($s == count_chars($n)) $ans = 'Yes';
    }
    echo $ans . PHP_EOL;
    exit();
}

// 4桁以上の場合
$n = 96;
while ($n < 1000) {
    $n += 8;
    $arr[] = count_chars($n);
}
$ans = 'No';
foreach ($arr as $a) {
    $flag = true;
    foreach ($a as $i => $c) {
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
