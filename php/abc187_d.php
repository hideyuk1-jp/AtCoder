<?php
[$N] = ints();
$p = new SplPriorityQueue();
$t = 0;
for ($i = 0; $i < $N; ++$i) {
    [$a, $b] = ints();
    $t -= $a;
    $p->insert(2 * $a + $b, 2 * $a + $b);
}
$cnt = 0;
while ($t <= 0) {
    $v = $p->extract();
    $t += $v;
    ++$cnt;
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
