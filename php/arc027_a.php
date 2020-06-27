<?php
list($h, $m) = ints();
echo ((18 - ($h + 1)) * 60 + 60 - $m) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
