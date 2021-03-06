<?php
[$N, $M] = ints();
$a = ints();
$x = array_fill(0, $N + 1, -1);
$max = array_fill(0, $N + 1, 0);
for ($i = 0; $i < $N; ++$i) {
    $max[$a[$i]] = max($max[$a[$i]], $i - $x[$a[$i]]);
    $x[$a[$i]] = $i;
}
for ($i = 0; $i <= $N; ++$i) {
    $max[$i] = max($max[$i], $N - $x[$i]);
}
for ($i = 0; $i <= $N; ++$i) {
    if ($max[$i] > $M) {
        echo $i, PHP_EOL;
        break;
    }
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
