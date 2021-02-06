<?php
[$N] = ints();
echo $N % 2 ? 'Black' : 'White';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
