<?php
list($w, $h) = ints();
echo intdiv($w, 4) * 3 === $h ? '4:3' : '16:9';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
