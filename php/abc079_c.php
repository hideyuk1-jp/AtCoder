<?php
$a = array_map('intval', str_split(trim(fgets(STDIN))));
$n = 3;
for ($i = 0; $i < 2 ** $n; ++$i) {
    $cnt = $a[0];
    $ans = (string) $a[0];
    for ($j = 0; $j < $n; $j++) {
        if (($i >> $j) & 1) {
            $cnt += $a[$j + 1];
            $ans .= '+' . (string) $a[$j + 1];
        } else {
            $cnt -= $a[$j + 1];
            $ans .= '-' . (string) $a[$j + 1];
        }
    }
    $ans .= '=7';
    if ($cnt === 7) break;
}
echo $ans;
