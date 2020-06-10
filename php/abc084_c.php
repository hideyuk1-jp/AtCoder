<?php
list($n) = ints();
for ($i = 0; $i < $n; $i++) {
    list($c[], $s[], $f[]) = ints();
}
for ($i = 0; $i < $n; $i++) {
    $t = 0;
    for ($j = $i; $j < $n - 1; $j++) {
        if ($t < $s[$j]) {
            $t = $s[$j] + $c[$j];
        } else {
            $t = $f[$j] * intval(ceil($t / $f[$j])) + $c[$j];
        }
    }
    $ans[] = $t;
}
echo implode(PHP_EOL, $ans);

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
