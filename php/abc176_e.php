<?php
list($H, $W, $M) = ints();
for ($i = 0; $i < $M; ++$i) {
    list($h, $w) = ints();
    --$h;
    --$w;
    $exist[$h][$w] = true;
    if (isset($row[$h])) ++$row[$h];
    else $row[$h] = 1;
    if (isset($col[$w])) ++$col[$w];
    else $col[$w] = 1;
}
$rowMax = 0;
foreach ($row as $i => $cnt) {
    if ($cnt > $rowMax) {
        $rowMax = $cnt;
        $maxi = [$i];
    }
    if ($cnt === $rowMax) {
        $maxi[] = $i;
    }
}
$colMax = 0;
foreach ($col as $j => $cnt) {
    if ($cnt > $colMax) {
        $colMax = $cnt;
        $maxj = [$j];
    }
    if ($cnt === $colMax) {
        $maxj[] = $j;
    }
}
foreach ($maxi as $i) {
    foreach ($maxj as $j) {
        if (!isset($exist[$i][$j])) {
            echo $rowMax + $colMax;
            exit();
        }
    }
}
echo $rowMax + $colMax - 1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
