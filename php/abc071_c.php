<?php
list($n) = ints();
$a = ints();
for ($i = 0; $i < $n; ++$i) {
    if (isset($cnt[$a[$i]])) $cnt[$a[$i]]++;
    else $cnt[$a[$i]] = 1;
}
krsort($cnt);
$st = [];
foreach ($cnt as $i => $v) {
    if (count($st) === 0) {
        if ($v >= 4) {
            $st = [$i, $i];
            break;
        } elseif ($v >= 2) {
            $st[] = $i;
        }
    } else {
        if ($v >= 2) {
            $st[] = $i;
            break;
        }
    }
}
if (count($st) < 2) exit('0');
echo $st[0] * $st[1];
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
