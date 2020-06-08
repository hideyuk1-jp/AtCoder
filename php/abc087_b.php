<?php
list($a) = ints();
list($b) = ints();
list($c) = ints();
list($x) = ints();
$cnt = 0;
for ($i = 0; $i <= $a; $i++) {
    for ($j = 0; $j <= $b; $j++) {
        if ($i * 500 + $j * 100 > $x) continue;
        $rest = $x - $i * 500 - $j * 100;
        if ($rest % 50 === 0 && $rest / 50 <= $c) $cnt++;
    }
}
echo $cnt;;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
