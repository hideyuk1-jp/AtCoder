<?php

list($n, $q) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a, $b) = ints();
    --$b;
    $rate[$i] = $a;
    $belong[$i] = $b;
    if (!isset($rates[$b])) {
        $rates[$b] = new MyMaxHeap();
    }
    $rates[$b]->insert($a);
}
$max = new MyMaxHeap();
foreach ($rates as $v) {
    $max->insert(-$v->top());
}
for ($i = 0; $i < $q; ++$i) {
    list($c, $to) = ints();
    --$c;
    --$to;

    // 退園
    $from = $belong[$c];
    $max->delete(-$rates[$from]->top());
    $rates[$from]->delete($rate[$c]);
    if ($rates[$from]->valid()) {
        $max->insert(-$rates[$from]->top());
    }

    // 入園
    $belong[$c] = $to;
    if (!isset($rates[$to])) {
        $rates[$to] = new MyMaxHeap();
    }
    if ($rates[$to]->valid()) {
        $max->delete(-$rates[$to]->top());
    }
    $rates[$to]->insert($rate[$c]);
    $max->insert(-$rates[$to]->top());

    $ans[] = -$max->top();
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

// 要素を削除した場合の先頭を取得出来るMaxHeap
class MyMaxHeap extends SplMaxHeap
{
    private $del;

    public function __construct()
    {
        $this->del = new SplMaxHeap();
    }

    public function count()
    {
        return parent::count() - $this->del->count();
    }

    public function extract()
    {
        $res = parent::extract();
        $this->setTop();
        return $res;
    }

    public function setTop()
    {
        while ($this->del->valid() && parent::top() === $this->del->top()) {
            parent::extract();
            $this->del->extract();
        }
    }

    public function delete($x)
    {
        $this->del->insert($x);
        $this->setTop();
    }
}
