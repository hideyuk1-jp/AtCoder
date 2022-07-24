<?php

list($s) = strs();
$k = 0;
$c = 0;
for ($i = 0; $i < strlen($s); ++$i) {
    if ($s[$i] === strtoupper($s[$i])) {
        ++$c;
        if ($c === 1) {
            $strs[$k] = $s[$i];
            $strs_s[$k] = strtolower($s[$i]);
        } elseif ($c === 2) {
            $strs[$k] .= $s[$i];
            $strs_s[$k] .= strtolower($s[$i]);
            $c = 0;
            ++$k;
        }
    } else {
        $strs[$k] .= $s[$i];
        $strs_s[$k] .= strtolower($s[$i]);
    }
}
array_multisort($strs_s, SORT_STRING, $strs);
echo implode('', $strs);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
