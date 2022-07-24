<?php

list($_s) = strs();
list($t) = strs();
$len_s = strlen($_s);
$len_t = strlen($t);
for ($i = $len_s - $len_t; $i >= 0; --$i) {
    $_sub = substr($_s, $i, $len_s);
    $flag = true;
    for ($j = 0; $j < $len_t; ++$j) {
        if ($_sub[$j] !== '?' && $_sub[$j] !== $t[$j]) {
            $flag = false;
            break;
        }
    }
    if ($flag) {
        $_s = substr_replace($_s, $t, $i, $len_t);
        $_s = str_replace('?', 'a', $_s);
        echo $_s;
        exit;
    }
}
echo 'UNRESTORABLE';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
