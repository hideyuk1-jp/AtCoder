<?php
list($x, $n) = ints();
$p = ints();
for ($i = 0; $i < $n; ++$i) $a[$p[$i]] = true;
$d = 0;
while (true) {
    if (!isset($a[$x - $d])) {
        $ans = $x - $d;
        break;
    }
    if (!isset($a[$x + $d])) {
        $ans = $x + $d;
        break;
    }
    $d++;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
