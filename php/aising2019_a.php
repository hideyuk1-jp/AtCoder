<?php
list($n) = ints();
list($h) = ints();
list($w) = ints();
echo ($n - $h + 1) * ($n - $w + 1);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
