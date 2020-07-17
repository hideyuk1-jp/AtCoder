<?php
list($n, $q) = ints();
for ($i = 0; $i < $q; ++$i) {
    list($type, $a, $b) = ints();
    --$a;
    if (isset($b)) --$b;
    if ($type === 1) {
        $follow[$a][$b] = true;
        $follower[$b][$a] = true;
    }
    if ($type === 2) {
        foreach ($follower[$a] as $k => $_) {
            $follow[$a][$k] = true;
            $follower[$k][$a] = true;
        }
    }
    if ($type === 3) {
        foreach ($follow[$a] as $k => $_) {
            foreach ($follow[$k] as $x => $_) {
                if ($a === $x) continue;
                $follow[$a][$x] = true;
                $follower[$x][$a] = true;
            }
        }
    }
}
for ($i = 0; $i < $n; ++$i) {
    for ($j = 0; $j < $n; ++$j) {
        echo isset($follow[$i][$j]) ? 'Y' : 'N';
    }
    echo PHP_EOL;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
