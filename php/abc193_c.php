<?php
[$N] = ints();
$i = 2;
$cnt = 0;
while ($i ** 2 <= $N) {
    $ti = $i ** 2;
    if (!isset($used[$ti])) {
        while ($ti <= $N) {
            ++$cnt;
            $used[$ti] = true;
            $ti *= $i;
        }
    }
    ++$i;
}
echo $N - $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
