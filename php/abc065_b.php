<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) list($a[]) = ints();
$cur = 0;
$cnt = 0;
$used[0] = true;
while (true) {
    $cnt++;
    $cur = $a[$cur];
    $cur--;
    if (isset($used[$cur])) exit('-1');
    if ($cur === 1) break;
    $used[$cur] = true;
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
