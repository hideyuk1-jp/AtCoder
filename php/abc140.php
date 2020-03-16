<?php
// D その2
fscanf(STDIN, '%d %d', $n, $k);
fscanf(STDIN, '%s', $s);
$ans = 0;
for ($i = 0; $i < $n - 1; $i++) {
    if ($s[$i] === $s[$i + 1]) $ans++;
}
$ans = min($n - 1, $ans + $k * 2);
echo $ans . PHP_EOL;

exit();

// D
fscanf(STDIN, '%d %d', $n, $k);
fscanf(STDIN, '%s', $s);
$i = $top = $cnt = $ans = 0;
$top_s = $s[$top];
while($top < $n) {
    $next_s = ($top_s === 'L') ? 'R' : 'L';
    $next_top = strpos($s, $next_s, $top);
    if ($next_top === false) $next_top = $n;
    $cnt_s = $next_top - $top;
    if ($i % 2 === 1) $cnt++;
    if ($cnt <= $k && $i !== 0) $ans += $cnt_s;
    else $ans += $cnt_s - 1;
    $i++;
    $top_s = $next_s;
    $top = $next_top;
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d', $n);
$b = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = 0;
for ($i = 0; $i < $n; $i++) {
    $ans += min($b[$i - 1] ?? $b[$i], $b[$i] ?? $b[$i - 1]);
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$b = array_map('intval', explode(' ', trim(fgets(STDIN))));
$c = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = 0;
for ($i = 0; $i < $n; $i++) {
    $ans += $b[$a[$i] - 1];
    if ($i < $n - 1 && $a[$i + 1] - $a[$i] === 1) {
        $ans += $c[$a[$i] - 1];
    }
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d', $n);
$ans = $n ** 3;
echo $ans . PHP_EOL;