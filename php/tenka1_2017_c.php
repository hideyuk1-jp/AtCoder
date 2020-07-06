<?php
list($n) = ints();
for ($a = 1; $a <= 3500; ++$a) {
    for ($b = $a; $b <= 3500; ++$b) {
        $x = $n * $a * $b;
        $y = 4 * $a * $b - $n * ($a + $b);
        if ($y > 0 && $x % $y === 0) {
            $c = intdiv($x, $y);
            break 2;
        }
    }
}
echo implode(' ', [$a, $b, $c]);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
