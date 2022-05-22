<?php

function seededShuffle(array &$array, $seed) {
    mt_srand($seed);
    $size = count($array);
    for ($i = 0; $i < $size; ++$i) {
        list($chunk) = array_splice($array, mt_rand(0, $size-1), 1);
        array_push($array, $chunk);
    }
}
