<?php

list($n, $m) = ints();
$uf = new UnionFind($n);
for ($i = 0; $i < $m; ++$i) {
    list($a, $b) = ints();
    --$a;
    --$b;
    $uf->unite($a, $b);
}
$max = 0;
for ($i = 0; $i < $n; ++$i) {
    $max = max($max, $uf->size($i));
}
echo $max;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
// Union-Find：同じグループに属するかどうかを判定する
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
