<?php
list($s) = strs();
for ($i = 0; $i < strlen($s); ++$i) {
    if (isset($cnt[$s[$i]])) ++$cnt[$s[$i]];
    else $cnt[$s[$i]] = 1;
}
arsort($cnt);
echo array_keys($cnt)[0];
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
