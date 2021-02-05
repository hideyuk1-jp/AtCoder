<?php
[$S] = strs();
echo $S[-1] === 's' ? "${S}es" . PHP_EOL : "${S}s" . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
