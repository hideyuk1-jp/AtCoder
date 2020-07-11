<?php
list($n) = ints();
$max = (int) (sqrt($n) + 1);
$ans = array_fill(1, $n, 0);
for ($x = 1; $x <= $max; ++$x) {
    for ($y = $x; $y <= $max; ++$y) {
        for ($z = $y; $z <= $max; ++$z) {
            $t = $x ** 2 + $y ** 2 + $z ** 2 + $x * $y + $y * $z + $x * $z;
            if ($t <= $n) {
                $c = count(array_unique([$x, $y, $z]));
                if ($c === 3) $ans[$t] += 6;
                elseif ($c === 2) $ans[$t] += 3;
                else ++$ans[$t];
            }
        }
    }
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
