<?php
list($s) = strs();
list($t) = strs();
$cnt = 0;
for ($i = 0; $i < strlen($s); ++$i) if ($s[$i] !== $t[$i]) ++$cnt;
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
