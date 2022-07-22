<?php
fscanf(STDIN, '%d %d', $n, $x);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = [];
for ($i = 0; $i < $n; ++$i) {
    if ($a[$i] === $x) continue;
    $ans[] = $a[$i];
}
echo implode(' ', $ans);