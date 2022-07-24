<?php

list($s) = strs();
foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $i => $v) {
    $cnt[$v] = (6 - $i) % 6;
};
echo $cnt[$s] . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
