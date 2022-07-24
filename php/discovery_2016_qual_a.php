<?php

list($w) = ints();
echo implode(PHP_EOL, str_split('DiscoPresentsDiscoveryChannelProgrammingContest2016', $w)) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
