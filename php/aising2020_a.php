<?php
list($l, $r, $d) = ints();
echo intdiv($r, $d) - intdiv($l - 1, $d);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
