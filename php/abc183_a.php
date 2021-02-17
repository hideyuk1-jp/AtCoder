<?php
[$x] = ints();
echo max($x, 0);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
