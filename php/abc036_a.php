<?php
list($a, $b) = ints();
echo intdivceil($b, $a);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function intdivceil($a, $b)
{
    return $a % $b ? intdiv($a, $b) + 1 : intdiv($a, $b);
}
