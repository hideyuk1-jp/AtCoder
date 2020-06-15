<?php
list($n) = ints();
echo 'ABC' . $n;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
