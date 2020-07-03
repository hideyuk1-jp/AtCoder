<?php
list($n) = ints();
$a = ints();
$avg = array_sum($a) / $n;
$mind = PHP_INT_MAX;
for ($i = 0; $i < $n; ++$i) {
    if ($mind > abs($avg - $a[$i])) {
        $mind = abs($avg - $a[$i]);
        $mini = $i;
    }
}
echo $mini;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
