<?php
[$S] = strs();
$N = strlen($S);
$ans = "Yes";
for ($i = 0; $i < $N; ++$i) {
    if ($i % 2) {
        if ($S[$i] !== strtoupper($S[$i])) {
            $ans = "No";
            break;
        }
    } else {
        if ($S[$i] !== strtolower($S[$i])) {
            $ans = "No";
            break;
        }
    }
}
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
