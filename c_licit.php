<?php


function c_licit_new() {
    $lakasok = m_lakasok();
    $id = $_GET['id'];
    if (!isset($lakasok[$id])) die("Nincs ilyen lakás.");
    $lakas = $lakasok[$id];
    $licit = array('lakasid' => $id, 'nev' => "", 'szig' => "", 'tel' => "", 'ar' => m_licit_uj_ar($lakas['ar']));

    include("v_licit_new_$_GET[format].php");
    
}

function c_licit_create() {
    $lakasok = m_lakasok();
    $id = $_GET['id'];
    if (!isset($lakasok[$id])) die("Nincs ilyen lakás.");
    $lakas = $lakasok[$id];
    $licit = array('lakasid' => $id, 'nev' => $_POST['nev'], 'szig' => $_POST['szig'], 'tel' => $_POST['tel'], 'ar' => $_POST['ar']);

    $hibak = m_licit_check($licit);
    if (!$hibak) {
        if ($_GET['format'] == 'html') {
            m_licit_save($licit);
            header("Location: ?c=lakas&action=show&id=$id");
        }
    } else {
        include("v_licit_new_$_GET[format].php");
    }
}
