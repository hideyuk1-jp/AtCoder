<?php
list($s) = strs();
list($i) = ints();
echo $s[$i - 1];
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
