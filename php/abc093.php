<?php
// C
fscanf(STDIN, '%d %d %d', $a, $b, $c);
$a = [$a, $b, $c];
sort($a);
if (count(array_unique($a)) === 1) exit('0');
$ans = $a[2] - $a[1];
$ans += intdiv($a[1] - $a[0], 2);
if (($a[1] - $a[0]) % 2 === 1) $ans += 2;
echo $ans;

exit;

// B
fscanf(STDIN, '%d %d %d', $a, $b, $k);
for ($i = $a; $i <= min($a + $k - 1, $b); $i++) {
    $ans[] = $i;
}
for ($i = max($b - $k + 1, $i); $i <= $b; $i++) {
    $ans[] = $i;
}
$ans = array_unique($ans);
echo implode(PHP_EOL, $ans);

exit;

// A
fscanf(STDIN, '%s', $s);
echo $s[0] !== $s[1] && $s[1] !== $s[2] && $s[0] !== $s[2] ? 'Yes' : 'No';
