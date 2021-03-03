<?php
[$N, $X] = ints();
[$S] = strs();
for ($i = 0; $i < $N; ++$i) {
    if ($S[$i] === "o") ++$X;
    else --$X;
    $X = max(0, $X);
}
echo $X;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
