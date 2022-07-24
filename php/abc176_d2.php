<?php

$di = [0, 1];
$dj = [1, 0];
list($h, $w) = ints();
list($si, $sj) = ints();
--$si;
--$sj;
list($gi, $gj) = ints();
--$gi;
--$gj;
for ($i = 0; $i < $h; ++$i) {
    list($c[]) = strs();
}
$uf = new UnionFind($h * $w);
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if ($c[$i][$j] === '#') {
            continue;
        }
        for ($dir = 0; $dir < 2; ++$dir) {
            $ni = $i + $di[$dir];
            $nj = $j + $dj[$dir];
            // 範囲外か壁であればコンテニュー
            if ($ni < 0 || $ni > $h - 1 || $nj < 0 || $nj > $w - 1) {
                continue;
            }
            if ($c[$ni][$nj] === '#') {
                continue;
            }
            $uf->unite($i * $w + $j, $ni * $w + $nj);
        }
    }
}
$di = [0, 1, 1, 2, 2, 2];
$dj = [2, 1, 2, 0, 1, 2];
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if ($c[$i][$j] === '#') {
            continue;
        }
        for ($dir = 0; $dir < 6; ++$dir) {
            $ni = $i + $di[$dir];
            $nj = $j + $dj[$dir];
            // 範囲外か壁であればコンテニュー
            if ($ni < 0 || $ni > $h - 1 || $nj < 0 || $nj > $w - 1) {
                continue;
            }
            if ($c[$ni][$nj] === '#') {
                continue;
            }
            $r = $uf->root($i * $w + $j);
            $nr = $uf->root($ni * $w + $nj);
            if ($r !== $nr) {
                $g[$r][$nr] = 1;
                $g[$nr][$r] = 1;
            }
        }
        for ($dir = 0; $dir < 6; ++$dir) {
            $ni = $i + $di[$dir];
            $nj = $j - $dj[$dir];
            // 範囲外か壁であればコンテニュー
            if ($ni < 0 || $ni > $h - 1 || $nj < 0 || $nj > $w - 1) {
                continue;
            }
            if ($c[$ni][$nj] === '#') {
                continue;
            }
            $r = $uf->root($i * $w + $j);
            $nr = $uf->root($ni * $w + $nj);
            if ($r !== $nr) {
                $g[$r][$nr] = 1;
                $g[$nr][$r] = 1;
            }
        }
    }
}
$start = $uf->root($si * $w + $sj);
$goal = $uf->root($gi * $w + $gj);
// BFS（幅優先探索）：最短経路アルゴリズムとして活用
$q = new SplQueue(); // キューを用意
$dist[$start] = 0; // 始点からの距離格納配列
$q->enqueue($start); // キューに始点を追加
while (!$q->isEmpty()) {
    $v = $q->dequeue();
    if (!isset($g[$v])) {
        continue;
    }
    foreach ($g[$v] as $next_v => $_) {
        if (isset($dist[$next_v])) {
            continue;
        } // 発見済み
        $dist[$next_v] = $dist[$v] + 1;
        $q->enqueue($next_v);
    }
}
echo isset($dist[$goal]) ? $dist[$goal] : -1;
class UnionFind
{
    private $par; // par[$i]:$iの親 自分が根の場合は自身のindexとなる
    private $size;

    public function __construct($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->par[$i] = $i; // 最初は全てが根
            $this->size[$i] = 1;
        }
    }

    public function root($x)
    { // 根を返す
        if ($this->par[$x] === $x) {
            return $x;
        } // 根の場合
        return $this->par[$x] = $this->root($this->par[$x]); // 全ての枝の親を根にしながら再帰処理
    }

    public function unite($x, $y)
    { // $xと$yの木を併合
        $ix = $this->root($x);
        $iy = $this->root($y);
        if ($ix === $iy) {
            return;
        }
        if ($this->size[$ix] < $this->size[$iy]) {
            list($ix, $iy) = [$iy, $ix];
        }
        $this->size[$ix] += $this->size[$iy];
        $this->par[$iy] = $ix; // $yの根を$xの根に付ける
    }

    public function isSame($x, $y)
    { // $xと$yの根が同じか
        return $this->root($x) === $this->root($y);
    }

    public function size($x)
    { // xが属するグループのサイズ
        return $this->size[$this->root($x)];
    }

    public function count()
    { // グループの数
        $cnt = 0;
        foreach ($this->par as $i => $r) {
            if ($i === $r) {
                ++$cnt;
            }
        }
        return $cnt;
    }
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
