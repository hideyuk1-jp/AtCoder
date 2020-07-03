<?php
list($a) = strs();
list($b) = ints();
echo $a[($b - 1) % strlen($a)] . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
