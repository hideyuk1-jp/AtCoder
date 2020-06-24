<?php
list($a, $b) = ints();
if (abs($a) < abs($b)) echo 'Ant';
elseif (abs($a) > abs($b)) echo 'Bug';
else echo 'Draw';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
