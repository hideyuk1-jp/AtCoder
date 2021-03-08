<?php
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$b = array_map('intval', explode(' ', trim(fgets(STDIN))));
$p = 0;
for ($i = 0; $i < $n; $i++) {
    $p += $a[$i] * $b[$i];
}
echo $p === 0 ? 'Yes' : 'No';
