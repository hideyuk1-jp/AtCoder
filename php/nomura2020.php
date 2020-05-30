<?php
// C2
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
for ($i = $n - 1; $i >= 0; $i--) {
    $notha[$i] = min($notha[$i + 1] ?? 0 + $a[$i + 1], 2 ** $i - $a[$i]);
}
if (min($notha) <= 0) exit('-1');
for ($i = 1; $i <= $n - 1; $i++) {
    $notha[$i] = min($notha[$i], $notha[$i - 1] * 2 - $a[$i]);
}
if (min($notha) <= 0) exit('-1');
$ans = array_sum($notha) + array_sum($a);
echo $ans;

exit;

// C1
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = f();
echo $ans;

function f($d = 0, $pnotha = 1)
{
    global $n, $a;
    // 1-n
    if (2 * $pnotha < $a[$d]) return -1;
    if ($d === $n) {
        if ($pnotha > $a[$d]) return -1;
        return $a[$d];
    }
    for ($i = min(2 * $pnotha, 2 ** $d) - $a[$d]; $i >= 0; $i--) {
        $tmp = f($d + 1, $i);
        if ($tmp !== -1) return $i + $a[$d] + $tmp;
    }
    return -1;
}

exit;

// B
fscanf(STDIN, '%s', $t);
echo str_replace('?', 'D', $t);

exit;

// A
fscanf(STDIN, '%d %d %d %d %d', $h1, $m1, $h2, $m2, $k);
echo ($h2 * 60 + $m2) - $k - ($h1 * 60 + $m1);
