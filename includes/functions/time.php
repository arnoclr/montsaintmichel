<?php

function timeAgo($timestamp) {
    $t = ['an' => 31556926, 'mois' => 2629744, 'semaine' => 604800, 'jour' => 86400, 'heure' => 3600, 'minute' => 60, 'seconde' => 1];

    $diff = time() - $timestamp;
    foreach ($t as $unit => $seconds) {
        if ($seconds <= $diff) {
            $v = floor($diff / $seconds);
            return "il y à $v $unit" . (($v == 1 || $unit[-1] == 's') ? '' : 's');
        }
    }
}
