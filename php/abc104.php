<?php
// C2 解説の方法でAC
fscanf(STDIN, '%d %d', $D, $G);
for ($i = 0; $i < $D; $i++) {
    fscanf(STDIN, '%d %d', $p[], $c[]);
}
$ans = PHP_INT_MAX;
for ($i = 0; $i < (1 << $D); $i++) {
    $score = 0;
    $num = 0;
    $rest_max = -1;
    for ($j = 0; $j < $D; $j++) {
        if ($i >> $j & 1) {
            $score += 100 * ($j + 1) * $p[$j] + $c[$j];
            $num += $p[$j];
        } else {
            $rest_max = $j;
        }
    }
    if ($score < $G) {
        $need = (int) ceil(($G - $score) / (100 * ($rest_max + 1)));
        if ($need >= $p[$rest_max]) continue;
        $num += $need;
    }
    $ans = min($ans, $num);
}
echo $ans;

exit;

// C
fscanf(STDIN, '%d %d', $D, $G);
for ($i = 1; $i <= $D; $i++) {
    fscanf(STDIN, '%d %d', $p, $c);
    for ($j = 0; $j <= $p; $j++) {
        $score[$i][$j] = 100 * $i * $j;
        if ($j === $p) $score[$i][$j] += $c;
    }
}
$ans = dp(1, $G);
echo $ans;

function dp($n, $goal)
{
    global $score, $memo, $D;

    if (isset($memo[$n][$goal])) return $memo[$n][$goal];
    if ($goal <= 0) return 0;

    $num = 10000;
    foreach ($score[$n] as $i => $v) {
        if ($n !== $D) {
            $nnum = dp($n + 1, $goal - $v);
        } else {
            if ($v < $goal) continue;
            $nnum = 0;
        }
        if ($nnum >= 10000) continue;
        $num = min($num, $i + $nnum);
    }
    $memo[$n][$goal] = $num;
    return $memo[$n][$goal];
}

exit;

// B
fscanf(STDIN, '%s', $s);
if ($s[0] !== 'A') exit('WA');
$cc = -1;
for ($i = 1; $i < strlen($s); $i++) {
    if ($s[$i] === 'C') {
        if ($cc !==  -1) exit('WA');
        $cc = $i + 1;
    } elseif (preg_match('/[A-Z]/', $s[$i])) {
        exit('WA');
    }
}
if ($cc >= 3 && $cc <= strlen($s) - 1) echo 'AC';
else echo 'WA';

exit;

// A
fscanf(STDIN, '%d', $r);
if ($r < 1200) $ans = 'ABC';
elseif ($r < 2800) $ans = 'ARC';
else $ans = 'AGC';
echo $ans;
