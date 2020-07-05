<?php
list($n) = ints();
$cnt = 0;
$cntlb = $cntra = $cntlbra = 0;
for ($i = 0; $i < $n; ++$i) {
    list($s) = strs();
    $m = strlen($s);
    if ($s[0] === 'B' && $s[$m - 1] === 'A') ++$cntlbra;
    elseif ($s[0] === 'B') ++$cntlb;
    elseif ($s[$m - 1] === 'A') ++$cntra;
    for ($j = 0; $j < $m - 1; ++$j)
        if ($s[$j] === 'A' && $s[$j + 1] === 'B') ++$cnt;
}
if ($cntlbra > 0) {
    $cnt += $cntlbra - 1;
    if ($cntlb > 0) {
        ++$cnt;
        --$cntlb;
    }
    if ($cntra > 0) {
        ++$cnt;
        --$cntra;
    }
}
$cnt += min($cntlb, $cntra);
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
