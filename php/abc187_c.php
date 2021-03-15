<?php
fscanf(STDIN, '%d', $n);
for ($i = 0; $i < $n; $i++) {
    fscanf(STDIN, '%s', $s);
    if ($s[0] === '!') {
        $s = substr($s, 1);
        $exits1[$s] = true;
        if (isset($exits2[$s])) $ans = $s;
    } else {
        $exits2[$s] = true;
        if (isset($exits1[$s])) $ans = $s;
    }
}
echo $ans ?? 'satisfiable';
