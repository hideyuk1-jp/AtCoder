<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[$i], $b[$i]) = ints();
    $x[$i] = $a[$i] + $b[$i];
}
array_multisort($x, SORT_DESC, $a, $b);
$ascore = $bscore = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($i % 2 === 0) {
        $ascore += $a[$i];
    } else {
        $bscore += $b[$i];
    }
}
echo $ascore - $bscore;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
