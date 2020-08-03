<?php
list($n, $q) = ints();
$c = ints();
for ($i = 0; $i < $q; ++$i) {
    list($ls[$i], $rs[$i]) = ints();
    --$ls[$i];
    --$rs[$i];
    $ids[$i] = $i;
}
// r昇順ソート
array_multisort($rs, SORT_ASC, $ls, $ids);
$bit = new RangeSetBIT($n + 2);
$prev = array_fill(0, $n + 2, -1);
$ans = array_fill(0, $q, 0);
$r = 0;
for ($i = 0; $i < $q; ++$i) {
    while ($r <= $rs[$i]) {
        $bit->add($prev[$c[$r]] + 2, $r + 2, 1);
        $prev[$c[$r]] = $r;
        ++$r;
    }
    $tmp = $bit->sum($ls[$i] + 1, $ls[$i] + 2);
    $ans[$ids[$i]] = $tmp;
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
// 区間の更新と区間の和の取得を高速に処理
class RangeSetBIT
{
    private $p;
    private $q;

    public function __construct(int $n)
    {
        $this->p = new BIT($n + 1);
        $this->q = new BIT($n + 1);
    }

    // [i, j) 1-indexed
    // i ~ j-1 に x を加算
    public function add(int $i, int $j, int $x): void
    {
        $this->p->add($i, -$x * $i);
        $this->p->add($j, $x * $j);
        $this->q->add($i, $x);
        $this->q->add($j, -$x);
    }

    // [i, j) 1-indexed
    // i ~ j-1 の合計を取得
    public function sum(int $i, int $j): int
    {
        return $this->p->sum($j)
            + $this->q->sum($j)  * $j
            - $this->p->sum($i)
            - $this->q->sum($i) * $i;
    }
}
// 値の更新と区間の和の取得を高速に処理
class BIT
{
    private $n;
    private $tree;

    public function __construct(int $n)
    {
        $this->n = $n;
        $this->tree = array_fill(0, $n + 1, 0);
    }

    // i 1-indexed
    // i に x を加算
    public function add(int $i, int $x): void
    {
        while ($i <= $this->n) {
            $this->tree[$i] += $x;
            $i += $i & -$i;
        }
    }

    // [1, i) 1-indexed
    // 1 ~ i-1 の合計を取得
    public function sum(int $i): int
    {
        --$i;
        $res = 0;
        while ($i > 0) {
            $res += $this->tree[$i];
            $i -=  $i & -$i;
        }
        return $res;
    }
}
