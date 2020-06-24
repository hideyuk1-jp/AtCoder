<?php
list($R, $C, $K) = ints();
list($N) = ints();
$cntr = array_fill(0, $R, 0);
$cntc = array_fill(0, $C, 0);
for ($i = 0; $i < $N; ++$i) {
    list($r, $c) = ints();
    --$r;
    --$c;
    $rc[] = [$r, $c];
    $cntr[$r]++;
    $cntc[$c]++;
}
foreach ($cntr as $v) {
    if (isset($cr[$v])) $cr[$v]++;
    else $cr[$v] = 1;
}
foreach ($cntc as $v) {
    if (isset($cc[$v])) $cc[$v]++;
    else $cc[$v] = 1;
}
// K個になる数を集計（マスに飴がある場合は重複して数えられる）
$cnt = 0;
foreach ($cr as $i => $r) $cnt += $r * ($cc[$K - $i] ?? 0);
// マスに飴がありK個になる数を引き、マスに飴がありK+1個になる数を足す
foreach ($rc as list($r, $c)) {
    if ($cntr[$r] + $cntc[$c] === $K) --$cnt;
    if ($cntr[$r] + $cntc[$c] === $K + 1) ++$cnt;
}
echo $cnt . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
