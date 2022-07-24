<?php

list($s) = strs();
for ($i = 0; $i < 26; ++$i) {
    $a2n[chr(97 + $i)] = $i;
}
if ($s === 'zyxwvutsrqponmlkjihgfedcba') {
    exit('-1');
}
if (strlen($s) < 26) {
    for ($i = 0; $i < 26; ++$i) {
        if (strpos($s, chr(97 + $i)) === false) {
            echo $s . chr(97 + $i);
            exit;
        }
    }
}
// 26文字の場合
for ($i = 2; $i <= strlen($s); ++$i) {
    $a = str_split(substr($s, -$i));
    $b = $a;
    natsort($b);
    $b = array_values($b);
    if ($a[0] !== $b[count($b) - 1]) {
        foreach ($b as $bb) {
            if ($a2n[$bb] > $a2n[$a[0]]) {
                break;
            }
        }
        echo substr($s, 0, -$i) . $bb;
        exit;
    }
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
