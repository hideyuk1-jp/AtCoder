<?php

list($s) = strs();
if ($s === 'a' || $s === str_repeat('z', 20)) {
    exit('NO');
}
if ($s !== strrev($s)) {
    exit(strrev($s));
}
$as = str_split($s);
sort($as, SORT_STRING);
if ($s !== implode('', $as)) {
    exit(implode('', $as));
}
// 全て同じ文字列の場合しか残らない
for ($i = 0; $i < 26; ++$i) {
    $a2n[chr(97 + $i)] = $i + 1;
    $n2a[$i + 1] = chr(97 + $i);
}
$c = count($as);
if ($c === 1 || $a[0] === 'z') {
    $as[0] = $n2a[$a2n[$as[0]] - 1];
    $as[$c] = 'a';
} else {
    $as[0] = $n2a[$a2n[$as[0]] + 1];
    if ($as[$c - 1] === 'a') {
        unset($as[$c - 1]);
    } else {
        $as[$c - 1] = $n2a[$a2n[$as[$c - 1]] - 1];
    }
}
echo implode('', $as);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
