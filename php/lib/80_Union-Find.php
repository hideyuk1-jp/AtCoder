<?php
// Union-Find：同じグループに属するかどうかを判定する
class UnionFind
{
    private $par; // par[$i]:$iの親 自分が根の場合は自身のindexとなる
    private $size;

    function __construct($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->par[$i] = $i; // 最初は全てが根
            $this->size[$i] = 1;
        }
    }

    function root($x)
    { // 根を返す
        if ($this->par[$x] === $x) return $x; // 根の場合
        return $this->par[$x] = $this->root($this->par[$x]); // 全ての枝の親を根にしながら再帰処理
    }

    function unite($x, $y)
    { // $xと$yの木を併合
        $ix = $this->root($x);
        $iy = $this->root($y);
        if ($ix === $iy) return;
        if ($this->size[$ix] < $this->size[$iy]) list($ix, $iy) = [$iy, $ix];
        $this->size[$ix] += $this->size[$iy];
        $this->par[$iy] = $ix; // $yの根を$xの根に付ける
    }

    function isSame($x, $y)
    { // $xと$yの根が同じか
        return $this->root($x) === $this->root($y);
    }

    function size($x)
    {
        return $this->size[$this->root($x)];
    }
}

fscanf(STDIN, '%d %d', $n, $m);
$p = array_map('intval', explode(' ', trim(fgets(STDIN))));

$tree = new UnionFind($n);

for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $x, $y);
    $x--;
    $y--; // 0 ~ $n-1に合わせる
    $tree->unite($x, $y);
}

$cnt = 0;
for ($i = 0; $i < $n; $i++) {
    if ($tree->isSame($i, $p[$i])) $cnt++;
}

echo $cnt . PHP_EOL;
