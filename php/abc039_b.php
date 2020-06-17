<?php
list($x) = ints();
echo sqrt(sqrt($x));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
