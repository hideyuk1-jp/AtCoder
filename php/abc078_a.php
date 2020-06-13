<?php
list($x, $y) = strs();
$t = strnatcmp($x, $y);
if ($t < 0) echo '<';
elseif ($t > 0) echo '>';
else echo '=';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
