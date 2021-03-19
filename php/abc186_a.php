<?php
[$N, $W] = ints();
echo intdiv($N, $W);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
