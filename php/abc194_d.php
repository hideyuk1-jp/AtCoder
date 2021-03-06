<?php
[$N] = ints();
$ans = 0;
for ($i = 1; $i < $N; ++$i) {
    $ans += $N / $i;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
