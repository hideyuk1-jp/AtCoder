<?php

$s = strs();
foreach ($s as $ss) {
    echo $ss[0];
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
