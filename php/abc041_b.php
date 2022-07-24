<?php

define('MOD', 10 ** 9 + 7);
$a = ints();
echo((($a[0] * $a[1]) % MOD) * $a[2]) % MOD;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
