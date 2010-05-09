<?php

function c_lakas_index() {
    $lakasok = m_lakasok();

    include("v_lakas_index_$_GET[format].php");
}

function c_lakas_show() {
    $lakasok = m_lakasok();
    if (!isset($lakasok[$_GET['id']])) die("Nincs ilyen lakás.");
    $lakas = $lakasok[$_GET['id']];
    $licitek = m_lakas_licitek($lakas);

    include("v_lakas_show_$_GET[format].php");
}



    

