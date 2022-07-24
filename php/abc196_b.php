<?php

[$S] = strs();
echo explode(".", $S)[0];
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
