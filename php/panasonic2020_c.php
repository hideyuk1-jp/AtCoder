<?php

list($n) = ints();
$a[0] = ['a'];
$i = 1;
while (!isset($a[$n - 1])) {
    foreach ($a[$i - 1] as $v) {
        for ($j = 0; $j < 26; ++$j) {
            $a[$i][] = $v . chr(97 + $j);
            if (strpos($v, chr(97 + $j)) === false) {
                break;
            }
        }
    }
}
echo implode(PHP_EOL, $a[$n - 1]);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
