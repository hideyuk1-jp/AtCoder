<?php

// G 6
define('WALL', '#');
define('ROAD', '.');
fscanf(STDIN, '%d %d %d', $N, $X, $Y);
$X += 201;
$Y += 201;
$s = array_fill(0, 403, str_repeat('.', 403));
for ($i  = 0; $i < $N; $i++) {
    fscanf(STDIN, '%d %d', $x, $y);
    $x += 201;
    $y += 201;
    $s[$y][$x] = WALL;
}
$h = $w = 403;
$g = array_fill(0, $h * $w, []);
for ($i  = 0; $i < $h * $w; $i++) {
    $l = intval(floor($i / $w));
    $m = $i % $w;

    if ($s[$l][$m] === WALL) {
        continue;
    }

    if ($m < $w - 1 && $s[$l][$m + 1] === ROAD) {
        $g[$i][] = $i + 1;
        $g[$i + 1][] = $i;
    }

    if ($l < $h - 1 && $s[$l + 1][$m] === ROAD) {
        $g[$i][] = $i + $w;
        $g[$i + $w][] = $i;
    }

    if ($m > 0 && $l < $h - 1 && $s[$l + 1][$m - 1] === ROAD) {
        $g[$i][] = $i + $w - 1;
    }

    if ($l < $h - 1 && $m < $w - 1 && $s[$l + 1][$m + 1] === ROAD) {
        $g[$i][] = $i + $w + 1;
    }
}

// BFS（幅優先探索）：最短経路アルゴリズムとして活用
$q = new SplQueue(); // キューを用意
$dist = array_fill(0, 403 * 403, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

$dist[201 * $w + 201] = 0; // 頂点0からの距離格納配列
$q->enqueue(201 * $w + 201); // キューに0を追加

while (!$q->isEmpty()) {
    $v = $q->dequeue();

    foreach ($g[$v] as $next_v) {
        if ($dist[$next_v] !== -1) {
            continue;
        } // 発見済み

        $dist[$next_v] = $dist[$v] + 1;
        $q->enqueue($next_v);
    }
}
echo $dist[$Y * $w + $X];

exit;

// F 7
fscanf(STDIN, '%d', $n);
for ($i = 0; $i < $n; $i++) {
    $a[] = str_split(trim(fgets(STDIN)));
}
$m = (int) ceil($n / 2);
$ans = $n % 2 === 1 ? array_pop($a[$m - 1]) : '';
$s = '';
for ($i = 0; $i < intdiv($n, 2); $i++) {
    $c = array_intersect($a[$i], $a[$n - 1 - $i]);
    if (count($c) === 0) {
        echo(-1);
        exit;
    }
    $s .= array_pop($c);
}
$ans = $s . $ans . strrev($s);
echo $ans;

exit;

// E 7
fscanf(STDIN, '%d %d %d', $n, $m, $q);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $u, $v);
    $u--;
    $v--;
    $g[$u][] = $v;
    $g[$v][] = $u;
}
$c = array_map('intval', explode(' ', trim(fgets(STDIN))));
for ($i  = 0; $i < $q; $i++) {
    $s = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $s[1]--;
    if ($s[0] === 1) {
        $ans[] = $c[$s[1]];
        if (isset($g[$s[1]])) {
            foreach ($g[$s[1]] as $k) {
                $c[$k] = $c[$s[1]];
            }
        }
    } elseif ($s[0] === 2) {
        $ans[] = $c[$s[1]];
        $c[$s[1]] = $s[2];
    }
}
echo implode(PHP_EOL, $ans);

exit;

// D 7
fscanf(STDIN, '%d', $n);
$x = array_fill(0, $n, '');
$nums[0] = '####.##.##.####';
$nums[1] = '.#.##..#..#.###';
$nums[2] = '###..#####..###';
$nums[3] = '###..####..####';
$nums[4] = '#.##.####..#..#';
$nums[5] = '####..###..####';
$nums[6] = '####..####.####';
$nums[7] = '###..#..#..#..#';
$nums[8] = '####.#####.####';
$nums[9] = '####.####..####';
for ($i  = 0; $i < 5; $i++) {
    fscanf(STDIN, '%s', $s);
    for ($j = 0; $j < $n; $j++) {
        $x[$j] = $x[$j] . substr($s, 4 * $j + 1, 3);
    }
}
$ans = '';
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < 10; $j++) {
        if ($x[$i] === $nums[$j]) {
            $ans = $ans . strval($j);
        }
    }
}
echo $ans;

exit;

// C 8
fscanf(STDIN, '%d %d %d', $a, $r, $n);
if ($a * pow($r, $n - 1) > pow(10, 9)) {
    $ans = 'large';
} else {
    $ans = $a * pow($r, $n - 1);
}
echo $ans;

exit;

// B 8
fscanf(STDIN, '%d %d %d', $n, $m, $q);
$solve = array_fill(0, $n, []);
$score = array_fill(0, $m, $n);
for ($i  = 0; $i < $q; $i++) {
    $s = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $s[1]--;
    if (count($s) === 2) {
        $sum = 0;
        foreach ($solve[$s[1]] as $k) {
            $sum += $score[$k];
        }
        $ans[] = $sum;
    } elseif (count($s) === 3) {
        $s[2]--;
        $solve[$s[1]][] = $s[2];
        $score[$s[2]]--;
    }
}
echo implode(PHP_EOL, $ans);

exit;

// A 9
fscanf(STDIN, '%s', $s);
fscanf(STDIN, '%s', $t);
if ($s === $t) {
    $ans = 'same';
} elseif (strcasecmp($s, $t) === 0) {
    $ans = 'case-insensitive';
} else {
    $ans = 'different';
}
echo $ans;
