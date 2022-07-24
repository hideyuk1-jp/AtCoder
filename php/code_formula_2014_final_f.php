<?php

$x = 0;
$y = 100;
$prowr = 100;
for ($i = 100; $i >= 1; --$i) {
    if ($x + $i * 2 > 1500) {
        // 1段下へ
        $x = 0;
        $y += $prowr + $i;
        $prowr = $i;
    }
    $x += $i;
    $ans[] = "${x} ${y}";
    $x += $i;
}
echo implode(PHP_EOL, array_reverse($ans));
