<?php

// C
fscanf(STDIN, '%d %d', $n, $k);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
echo (int) ceil(($n - 1) / ($k - 1));

exit;

// B
fscanf(STDIN, '%d', $n);
$s = array_sum(str_split(strval($n)));
echo $n % $s ? 'No' : 'Yes';

exit;

// A
fscanf(STDIN, '%s', $s);
$ans = 0;
for ($i = 0; $i < strlen($s); $i++) {
    $ans += $s[$i] === '+' ? 1 : -1;
}
echo $ans;
