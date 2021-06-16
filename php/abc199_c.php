<?php
[$N] = ints();
[$S] = strs();
[$Q] = ints();
$cnts = [];
for ($i = 0; $i < $Q; ++$i) {
    [$t[], $a[], $b[]] = ints();
    --$a[$i];
    --$b[$i];
    $cnts[$i] = ($cnts[$i - 1] ?? 0);
    if ($t[$i] === 2) $cnts[$i]++;
}
if ($cnts[$Q - 1] % 2) $S = substr($S, $N) . substr($S, 0, $N);
for ($i = 0; $i < $Q; ++$i) {
    if ($t[$i] === 2) continue;
    if (($cnts[$Q - 1] - $cnts[$i]) % 2) {
        $a[$i] = ($a[$i] + $N) % (2 * $N);
        $b[$i] = ($b[$i] + $N) % (2 * $N);
    }
    [$S[$a[$i]], $S[$b[$i]]] = [$S[$b[$i]], $S[$a[$i]]];
}
echo $S;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
