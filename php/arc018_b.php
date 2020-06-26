<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) list($x[], $y[]) = ints();
$cnt = 0;
for ($i = 0; $i < $n - 2; ++$i) {
    for ($j = $i + 1; $j < $n - 1; ++$j) {
        for ($k = $j + 1; $k < $n; ++$k) {
            list($x1, $y1) = [$x[$j] - $x[$i], $y[$j] - $y[$i]];
            list($x2, $y2) = [$x[$k] - $x[$i], $y[$k] - $y[$i]];
            $sx2 = abs($x1 * $y2 - $x2 * $y1);
            if ($sx2 % 2 === 0 && $sx2 > 0) ++$cnt;
        }
    }
}
echo $cnt . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
