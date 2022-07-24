<?php

list($n) = ints();
for ($i = 0; $i < $n; $i++) {
    list($d) = ints();
    $cnt[$d] = true;
}
echo count($cnt);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
