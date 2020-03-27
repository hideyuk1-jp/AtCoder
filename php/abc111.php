<?php
// バーチャル参加 Cまで自力AC 600 61:34 => 推定パフォ1103

// C
fscanf(STDIN, '%d', $n);
$v = array_map('intval', explode(' ', trim(fgets(STDIN))));

for ($i = 0; $i < $n; $i++) {
    if ($i % 2 === 0) {
        if (isset($vk_cnt[$v[$i]])) {
            $vk_cnt[$v[$i]]++;
        } else {
            $vk_cnt[$v[$i]] = 1;
        }
    } else {
        if (isset($vg_cnt[$v[$i]])) {
            $vg_cnt[$v[$i]]++;
        } else {
            $vg_cnt[$v[$i]] = 1;
        }
    }
}
$qk = new SplPriorityQueue;
$qg = new SplPriorityQueue;

foreach ($vk_cnt as $i => $cnt) {
    $qk->insert([$i, $cnt], $cnt);
}
foreach ($vg_cnt as $i => $cnt) {
    $qg->insert([$i, $cnt], $cnt);
}

$vk = $qk->extract();
$vg = $qg->extract();
if ($vk[0] === $vg[0]) {
    if (!$qk->isEmpty()) {
        $vk2 = $qk->extract();
    } else {
        $vk2 = [-1, 0];
    }

    if (!$qg->isEmpty()) {
        $vg2 = $qg->extract();
    } else {
        $vg2 = [-1, 0];
    }

    if ($vk[1] + $vg2[1] > $vk2[1] + $vg[1]) {
        $vg = $vg2;
    } else {
        $vk = $vk2;
    }
}
$ans = count($v) - $vk[1] - $vg[1];
echo $ans;

exit;

// B
fscanf(STDIN, '%d', $n);
for ($i = $n; $i <= 999; $i++) {
    $s = strval($i);
    if (count(array_unique(str_split($s))) === 1) {
        echo $i;
        exit;
    }
}

exit;

// A
fscanf(STDIN, '%d', $n);
$s = strval($n);
$ans = '';
for ($i = 0; $i < strlen($s); $i++) {
    $ans .= $s[$i] === '1' ? '9' : '1';
}
echo (int) $ans;
