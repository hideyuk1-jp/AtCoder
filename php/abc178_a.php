<?php
list($n) = ints();
echo 1 - $n;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
