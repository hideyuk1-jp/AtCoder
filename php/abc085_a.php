<?php

list($s) = strs();
echo '2018' . substr($s, 4);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
