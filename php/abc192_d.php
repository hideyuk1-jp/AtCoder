<?php

[$S] = strs();
$N = strlen($S);
[$M] = ints();
$d = max(array_map('intval', str_split($S))) + 1;
$f = (int) $S[0];
$dt = $d;
while ($f * ($dt ** ($N - 1)) <=  $M) {
    $dt++;
}
--$dt;
$t = 0;
for ($i = 0; $i < $N; ++$i) {
    $t += (int)$S[$i] * ($dt ** ($N - 1 - $i));
}
if ($t > $M) {
    --$dt;
}
echo $dt - $d + 1;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
