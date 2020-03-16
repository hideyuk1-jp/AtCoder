<?php
fscanf(STDIN, '%d %d %d %d', $h, $w, $a, $b);
for ($i = 0; $i < $b; $i++) echo str_repeat('1', $a) . str_repeat('0', $w - $a) . PHP_EOL;
for ($i = $b; $i < $h; $i++) echo str_repeat('0', $a) . str_repeat('1', $w - $a) . PHP_EOL;

exit();

fscanf(STDIN, '%d %d', $n, $k);
$p = array_map('intval', explode(' ', trim(fgets(STDIN))));
$arr = [];
for ($i = 0; $i < $n - $k + 1; $i++) {
    if (count($arr) === 0) {
        $arr = array_slice($p, $i, $k);
        quicksort($arr, 0, count($arr - 1));
    } else {
        unset($arr[$i - 1]);
        $arr[$i + $k - 1] = $p[$i + $k - 1];
        asort($arr);
    }
    $_p = $p;
    array_splice($_p, $i, $k, $arr);
    $s = implode('', $_p);
    $x[$s] = 1;
}
echo count($x) . PHP_EOL;

function quickSort(&$list, $first, $last) {
    $firstPointer = $first;
    $lastPointer  = $last;
    //枢軸値を決める。配列の中央値
    $centerValue  = $list[intVal(($firstPointer + $lastPointer) / 2)];

    //並び替えができなくなるまで
    do {
        //枢軸よりも左側で値が小さい場合はポインターは進める
        while ($list[$firstPointer] < $centerValue) {
            $firstPointer++;
        }
        //枢軸よりも右側で値が大きい場合はポインターを減らす
        while ($list[$lastPointer] > $centerValue) {
            $lastPointer--;
        }
        //この操作で左側と右側の値を交換する場所は特定

        if ($firstPointer <= $lastPointer) {
            //ポインターが逆転していない時は交換可能
            $tmp                 = $list[$lastPointer];
            $list[$lastPointer]  = $list[$firstPointer];
            $list[$firstPointer] = $tmp;
            //ポインタを進めて分割する位置を指定
            $firstPointer++;
            $lastPointer--;
        }
    } while ($firstPointer <= $lastPointer);

    if ($first < $lastPointer) {
        //左側が比較可能の時
        quickSort($list, $first, $lastPointer);
    }

    if ($firstPointer < $last) {
        //右側が比較可能時
        quickSort($list, $firstPointer, $last);
    }
}

exit();

fscanf(STDIN, '%d %d %d %d', $h, $w, $a, $b);
$n = $h * $w;
$arr_w = func2($w, $a);
if (count($arr_w) === 0) {
    echo 'No' . PHP_EOL;
    exit();
}
$arr = func($h, $w, []);
if ($arr === false) {
    echo 'No' . PHP_EOL;
    exit();
}
for ($i = 0; $i < $n; $i++) {
    echo $arr[$i];
    if ($i % $w === $w - 1) echo PHP_EOL;
}

function func($h, $w, $arr) {
    global $b, $arr_w;
    $n = $h * $w;
    if (count($arr) < $n) {
        foreach ($arr_w as $v) {
            $arr0 = func($h, $w, array_merge($arr, $v));
            if ($arr0 !== false) return $arr0;
        }
        return false;
    }
    for ($i = 0; $i < $w; $i++) {
        $sum = 0;
        for ($j = 0; $j < $h; $j++) {
            $sum += $arr[$j * $w + $i];
        }
        if ($b !== min($sum, $h - $sum)) return false;
    }
    return $arr;
}

function func2($w, $a) {
    $res = [];
    for ($i = 0; $i < 2 ** $w; $i++) {
        $arr = array_map('intval', str_split(str_pad(decbin($i), $w, 0, STR_PAD_LEFT)));
        $sum = array_sum($arr);
        if ($a === min($sum, $w - $sum)) $res[] = $arr;
    }
    return $res;
}