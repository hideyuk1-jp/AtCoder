<?php

[$S] = strs();
echo $S[1] . $S[2] . $S[0];
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
