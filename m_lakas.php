<?php

$lakasok = array();
$indulo_ar=75000;

function m_lakas_init($nm, $db) {
    global $lakasok;
    global $indulo_ar;
    for($i=0; $i<$db; $i++) {
        $id = count($lakasok)+1;
        $lakasok[$id] = array('id' => $id, 'nm' => $nm, 'ar' => $nm*$indulo_ar);
    }
}

m_lakas_init(55, 8);
m_lakas_init(72, 6);
m_lakas_init(94, 5);


function m_lakasok() {
    global $lakasok;
    return $lakasok;
}





