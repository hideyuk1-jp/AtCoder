<?php

list($x[], $y[], $x[], $y[], $x[], $y[]) = ints();
$x = [0, $x[1] - $x[0], $x[2] - $x[0]];
$y = [0, $y[1] - $y[0], $y[2] - $y[0]];
echo(abs($x[1] * $y[2] - $x[2] * $y[1]) / 2) . PHP_EOL;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
