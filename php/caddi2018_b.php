<?php
list($n) = ints();
$isAllNoun = true;
for ($i = 0; $i < $n; ++$i) {
    list($a) = ints();
    if ($a % 2) $isAllNoun = false;
}
echo $isAllNoun ? 'second' : 'first';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
