<?php

function penz($s) {
    do {
        $s = preg_replace('/^(\d+)(\d\d\d\.|\d\d\d$)/', '\1.\2', $s, 1, $count);
    } while ($count > 0);
    return $s." Ft";
}
