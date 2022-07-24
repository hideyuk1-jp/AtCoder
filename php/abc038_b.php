<?php

list($h[], $w[]) = ints();
list($h[], $w[]) = ints();
if ($h[0] === $h[1] || $h[0] === $w[1]) {
    exit('YES');
}
if ($w[0] === $h[1] || $w[0] === $w[1]) {
    exit('YES');
}
echo 'NO';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
