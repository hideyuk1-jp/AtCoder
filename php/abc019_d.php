<?php
list($n) = ints();
$max = 0;
for ($i = 2; $i <= $n; ++$i) {
    echo '? ', 1, ' ', $i, PHP_EOL;
    list($d) = ints();
    if ($d > $max) {
        $max = $d;
        $maxi = $i;
    }
}
$max = 0;
for ($i = 1; $i <= $n; ++$i) {
    if ($i === $maxi) continue;
    echo '? ', $maxi, ' ', $i, PHP_EOL;
    list($d) = ints();
    $max = max($max, $d);
}
echo '! ', $max, PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
