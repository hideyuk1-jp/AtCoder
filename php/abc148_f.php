<?php
list($n, $u, $v) = ints();
--$u;
--$v;
for ($i = 0; $i < $n - 1; ++$i) {
    list($a, $b) = ints();
    --$a;
    --$b;
    $g[$a][] = $b;
    $g[$b][] = $a;
}
$du = bfs($u);
$dv = bfs($v);
$max = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($dv[$i] > $du[$i] &&  $dv[$i] > $max) {
        $max = $dv[$i];
        $mi = $i;
    }
}
echo $dv[$mi] - 1;
function bfs($s)
{
    global $n, $g;
    $q = new SplQueue(); // キューを用意
    $dist = array_fill(0, $n, -1); // 距離を格納する配列（-1の場合はその頂点が未発見）

    $dist[$s] = 0; // 始点からの距離格納配列
    $q->enqueue($s); // キューに始点を追加

    while (!$q->isEmpty()) {
        $v = $q->dequeue();

        foreach ($g[$v] as $next_v) {
            if ($dist[$next_v] !== -1) continue; // 発見済み

            $dist[$next_v] = $dist[$v] + 1;
            $q->enqueue($next_v);
        }
    }
    return $dist;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
