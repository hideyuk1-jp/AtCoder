<?php
list($n, $q) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[$i], $b[$i]) = ints();

    if (isset($cnt[$b[$i]][$a[$i]])) $cnt[$b[$i]][$a[$i]]++;
    else $cnt[$b[$i]][$a[$i]] = 1;

    if (isset($max[$b[$i]])) $max[$b[$i]] = max($max[$b[$i]], $a[$i]);
    else $max[$b[$i]] = $a[$i];
}
for ($i = 0; $i < $q; ++$i) {
    list($c, $d) = ints();

    if ($cnt[$b[$c]][$a[$c]] === 1) {
        unset($cnt[$b[$c]][$a[$c]]);
        if (count(array_keys($cnt[$b[$c]])) === 0) unset($max[$b[$c]]);
        else $max[$b[$c]] = max(array_keys($cnt[$b[$c]]));
    } else {
        $cnt[$b[$c]][$a[$c]]--;
    }

    if (isset($max[$d])) $max[$d] = max($max[$d], $a[$c]);
    else $max[$d] = $a[$c];
    if (isset($cnt[$d][$a[$c]])) $cnt[$d][$a[$c]]++;
    else $cnt[$d][$a[$c]] = 1;

    $ans[] = min($max);
    $b[$c] = $d;
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
