<?php
list($n) = ints();
echo intdiv($n, 3);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
