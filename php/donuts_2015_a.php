<?php
list($r, $d) = ints();
echo ($r * $r * pi()) * (2 * $d * pi());
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
