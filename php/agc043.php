<?php
define('WALL', '#');
define('ROAD', '.');
fscanf(STDIN, '%d %d', $h, $w);
for ($i  = 0; $i < $h; $i++) {
    $s[] = str_split(trim(fgets(STDIN)));
}
for ($i = 0; $i < $h; $i++) {
    for ($j = 0; $j < $w; $j++) {
        $cnt_down = $cnt[$i - 1][$j] ?? 0;
        $cnt_right = $cnt[$i][$j - 1] ?? 0;
        if ($s[$i][$j] === WALL && $s[$i - 1][$j] !== WALL) $cnt_down++;
        if ($s[$i][$j] === WALL && $s[$i][$j - 1] !== WALL) $cnt_right++;

        if ($i === 0) {
            $cnt[$i][$j] = $cnt_right;
        } elseif ($j === 0) {
            $cnt[$i][$j] = $cnt_down;
        } else {
            $cnt[$i][$j] = min($cnt_down, $cnt_right);
        }
    }
}
echo $cnt[$h - 1][$w - 1];
