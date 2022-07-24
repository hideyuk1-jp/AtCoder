<?php

list($n) = ints();
list($s) = strs();
$cnt['('] = 0;
$c = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === '(') {
        $c++;
    } else {
        $c--;
    }
    if ($c < 0) {
        $cnt['(']++;
        $c = 0;
    }
}
$cnt[')'] = 0;
$c = 0;
for ($i = $n - 1; $i >= 0; --$i) {
    if ($s[$i] === ')') {
        $c++;
    } else {
        $c--;
    }
    if ($c < 0) {
        $cnt[')']++;
        $c = 0;
    }
}
echo str_repeat('(', $cnt['(']) . $s . str_repeat(')', $cnt[')']);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
