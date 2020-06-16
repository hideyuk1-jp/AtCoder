<?php
list($n) = ints();
list($s) = strs();
foreach (['S', 'W'] as $a0) {
    foreach (['S', 'W'] as $a1) {
        if (check($a0, $a1)) {
            echo implode('', $a);
            exit;
        }
    }
}
exit('-1');
function check($a0, $a1)
{
    global $n, $s, $a;
    $a = [$a0, $a1];
    for ($i = 1; $i <= $n; ++$i) {
        if ($a[$i % $n] === 'S') {
            if ($s[$i % $n] === 'o') $a[($i + 1) % $n] = $a[$i - 1];
            else $a[($i + 1) % $n] = $a[$i - 1] === 'S' ? 'W' : 'S';
        } else {
            if ($s[$i % $n] === 'o') $a[($i + 1) % $n] = $a[$i - 1] === 'S' ? 'W' : 'S';
            else $a[($i + 1) % $n] = $a[$i - 1];
        }
    }
    return $a[0] === $a0 && $a[1] === $a1;
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
