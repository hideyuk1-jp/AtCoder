<?php
list($s) = strs();
echo strpos('aiueo', $s) !== false ? 'vowel' : 'consonant';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
