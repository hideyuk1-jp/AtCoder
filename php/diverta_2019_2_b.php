<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($x[$i], $y[$i]) = ints();
    $v[$x[$i]][$y[$i]] = true;
}
$max = 0;
for ($i = 0; $i < $n - 1; ++$i) {
    for ($j = $i + 1; $j < $n; ++$j) {
        $dx = $x[$j] - $x[$i];
        $dy = $y[$j] - $y[$i];
        if (isset($cnt[$dx][$dy])) {
            $cnt[$dx][$dy]++;
        } else {
            $cnt[$dx][$dy] = 1;
        }
        if (isset($cnt[-$dx][-$dy])) {
            $cnt[-$dx][-$dy]++;
        } else {
            $cnt[-$dx][-$dy] = 1;
        }
    }
}
$max = 0;
foreach ($cnt as $i => $v) {
    $max = max($max, max($v));
}
echo $n - $max;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
