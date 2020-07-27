<?php
list($n) = ints();
list($s) = strs();
for ($i = 0; $i < $n; ++$i) $a[] = 1 << (ord($s[$i]) - 97);
$st = new SegmentTree($a);
list($q) = ints();
for ($i = 0; $i < $q; ++$i) {
    list($type, $a, $b) = strs();
    if ($type === '1')
        $st->set((int)$a - 1, 1 << (ord($b) - 97));
    else
        $output[] = popcount($st->get((int)$a - 1, (int)$b));
}
echo implode(PHP_EOL, $output);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function popcount($x)
{
    $res = 0;
    while ($x > 0) {
        $x &= $x - 1;
        ++$res;
    }
    return $res;
}
// セグメントツリー
// 更新と取得を O(logN) で行う
class SegmentTree
{
    public $n;
    private $node;
    const UNIT = 0; // 単位元 問題に応じて変更する

    public function __construct(array $a)
    {
        $l = count($a);
        $this->n = 1;
        while ($this->n < $l) $this->n *= 2;
        $this->node = array_fill(0, 2 * $this->n - 1, self::UNIT);
        for ($i = 0; $i < $l; ++$i) $this->node[$i + $this->n - 1] = $a[$i];
        $this->updateAll();
    }

    private function updateAll(): void
    {
        for ($i = $this->n - 2; $i >= 0; --$i)
            $this->node[$i] = $this->op($this->node[2 * $i + 1], $this->node[2 * $i + 2]);
    }

    public function set(int $x, int $v): void
    {
        $x += $this->n - 1;
        $this->node[$x] = $v;
        $this->updateUp($x);
    }

    private function updateUp(int $x): void
    {
        while ($x > 0) {
            $x = intdiv($x - 1, 2);
            $this->node[$x] = $this->op($this->node[2 * $x + 1], $this->node[2 * $x + 2]);
        }
    }

    // 区間 [a, b)
    public function get(int $a, int $b): int
    {
        return $this->getProc($a, $b, 0, 0, $this->n);
    }

    private function getProc(int $a, int $b, int $k, int $l, int $r): int
    {
        // 範囲外
        if ($a >= $r || $b <= $l) return self::UNIT;
        // 完全に含む
        if ($a <= $l && $b >= $r) return $this->node[$k];
        // 一部含む
        $lc = $this->getProc($a, $b, 2 * $k + 1, $l, intdiv($l + $r, 2));
        $rc = $this->getProc($a, $b, 2 * $k + 2, intdiv($l + $r, 2), $r);
        return $this->op($lc, $rc);
    }

    // 二項演算 問題に応じて変更する
    private function op(int $a, int $b): int
    {
        return $a | $b;
    }
}
