<?php
list($n) = ints();
list($s1) = strs();
list($s2) = strs();
for ($i = 0; $i < 26; ++$i) $a2n[chr(65 + $i)] = $i;
$uf = new UnionFind(26);
// 同じ文字のグループ分け
for ($i = 0; $i < $n; ++$i) {
    if (!is_numeric($s1[$i]) && !is_numeric($s2[$i]) && $s1[$i] !== $s2[$i])
        $uf->unite($a2n[$s1[$i]], $a2n[$s2[$i]]);
}
// 数字が判明している文字を調べる
for ($i = 0; $i < $n; ++$i) {
    if (!is_numeric($s1[$i]) && is_numeric($s2[$i])) $comb[$uf->root($a2n[$s1[$i]])] = $s2[$i];
    if (is_numeric($s1[$i]) && !is_numeric($s2[$i])) $comb[$uf->root($a2n[$s2[$i]])] = $s1[$i];
}
$ans = 1;
for ($i = 0; $i < $n; ++$i) {
    //　数字の場合はスキップ
    if (is_numeric($s1[$i]) || is_numeric($s2[$i])) continue;
    // 数字が判明している文字の場合はスキップ
    if (isset($comb[$uf->root($a2n[$s1[$i]])]) || isset($comb[$uf->root($a2n[$s2[$i]])])) continue;
    // すでに登場している文字の場合スキップ
    if (isset($cnt[$s1[$i]]) || isset($cnt[$s2[$i]])) continue;

    if ($i === 0 && $n > 1) $ans *= 9;
    else $ans *= 10;
    $cnt[$s1[$i]] = $cnt[$s2[$i]] = true;
}
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
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
    {
        return $this->size[$this->root($x)];
    }
}
