<?php
list($s) = strs();
if ($s === 'RRR') exit('3');
if ($s === 'SRR' || $s === 'RRS') exit('2');
if ($s === 'RSS' || $s === 'SRS' || $s === 'SSR' || $s === 'RSR') exit('1');
echo '0';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
