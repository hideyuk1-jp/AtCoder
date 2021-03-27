<?php
[$H, $W, $Y, $X] = ints();
$X--;
$Y--;
for ($i = 0; $i < $H; ++$i) {
    [$S[]] = strs();
}
$cnt = 0;
$i = 0;
while (true) {
    if ($X + $i > $W - 1 || $S[$Y][$X + $i] === '#') break;
    $cnt++;
    $i++;
}
$i = 0;
while (true) {
    if ($X + $i < 0 || $S[$Y][$X + $i] === '#') break;
    $cnt++;
    $i--;
}
$i = 0;
while (true) {
    if ($Y + $i > $H - 1 || $S[$Y + $i][$X] === '#') break;
    $cnt++;
    $i++;
}
$i = 0;
while (true) {
    if ($Y + $i < 0 || $S[$Y + $i][$X] === '#') break;
    $cnt++;
    $i--;
}
echo $cnt - 3;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
