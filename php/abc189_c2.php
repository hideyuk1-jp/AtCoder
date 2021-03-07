<?php
// unionfind使って
[$N] = ints();
$a = ints();
$link = array_fill(1, 10 ** 5, []);
for ($i = 0; $i < $N - 1; ++$i) {
    $link[min($a[$i], $a[$i + 1])][] = $i;
}
$uf = new UnionFind($N);
$max = max($a);
for ($i = 10 ** 5; $i >= 1; --$i) {
    foreach ($link[$i] as $j) {
        $uf->unite($j, $j + 1);
        $max = max($max, $uf->size($j) * $i);
    }
}
echo $max;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
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
    { // xが属するグループのサイズ
        return $this->size[$this->root($x)];
    }

    function count()
    { // グループの数
        $cnt = 0;
        foreach ($this->par as $i => $r)
            if ($i === $r) ++$cnt;
        return $cnt;
    }
}
