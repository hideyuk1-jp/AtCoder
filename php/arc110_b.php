<?php
[$N] = ints();
[$T] = strs();
$S = "110";
if ($N === 1) {
    echo $T === "0" ? 10 ** 10 : 2 * 10 ** 10;
    exit();
}
switch ($T[0] . $T[1]) {
    case "11":
        $diff = 0;
        break;
    case "10":
        $diff = 1;
        break;
    case "01":
        $diff = 2;
        break;
    default:
        echo "0";
        exit();
}
$zero = 0;
for ($i = 0; $i < $N; ++$i) {
    if ($T[$i] !== $S[($i + $diff) % 3]) {
        echo "0";
        exit();
    }
    if ($T[$i] === "0") $zero++;
}
$ans = 10 ** 10 - $zero;
if ($T[strlen($T) - 1] === "0") $ans++;
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
