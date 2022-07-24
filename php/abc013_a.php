<?php

list($s) = strs();
foreach (['A', 'B', 'C', 'D', 'E'] as $i => $v) {
    if ($s === $v) {
        exit((string) ($i + 1) . PHP_EOL);
    }
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
