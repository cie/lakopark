<?php

define('LICIT_FAJL', 'licitek.dat');

$m_licit_fields = array(
    'lakasid' => null,
    'nev' => 'Teljes név',
    'szig' => 'Sz. ig. szám',
    'tel' => 'Telefonszám',
    'ar' => 'Licit'
);


function m_init() {
    global $licitek, $lakasok;
    $licitek = array();
    foreach(file(LICIT_FAJL) as $sor) {
        list($lakasid, $nev, $szig, $tel, $ar) = preg_split('/;/', $sor);
        $licitek[] = array(
            'lakasid' => $lakasid,
            'nev' => $nev,
            'szig' => $szig,
            'tel' => $tel,
            'ar' => $ar,
        );
        $lakasok[$lakasid]['ar'] = $ar;
    }
}


m_init();

function m_lakas_licitek($lakas) {
    global $licitek;
    $lakas_licitek = array();
    foreach($licitek as $l) {
        if ($l['lakasid'] == $lakas['id']) {
            $lakas_licitek[] = $l;
        }
    }
    return $lakas_licitek;
}


function m_licit_uj_ar($ar) {
    return ceil(($ar + 10000)/10000)*10000;
}


function m_licit_check(&$licit) {
    global $m_licit_fields;
    include_once("view_helpers.php");
    $lakasok = m_lakasok();
    $lakas = $lakasok[$licit['lakasid']];
    foreach ($m_licit_fields as $f => $t) $licit[$f] = trim($licit[$f]);
    $hibak = array();
    if (!preg_match('/ /', $licit['nev'])) 
        $hibak['nev'] = "Teljes nevet kell megadni!";
    if (!preg_match('/^\d{6}[A-Z]{2}$/', $licit['szig'])) 
        $hibak['szig'] = "Érvénytelen sz. ig. szám";
    $licit['ar'] = preg_replace('/[. ]/', '', $licit['ar']);
    $licit['ar'] = preg_replace('/Ft$/', '', $licit['ar']);
    if (!is_numeric($licit['ar']))
        $hibak['ar'] = "A megadott licit érvénytelen szám.";
    else if (0+$licit['ar'] <= $lakas['ar'])
        $hibak['ar'] = "Nagyobb árat kell megadni, mint ". penz($lakas['ar']) .".";
    return $hibak;
}


function m_licit_save($licit) {
    global $m_licit_fields;
    foreach ($m_licit_fields as $f => $t) $licit[$f] = preg_replace('/;/', ',', $licit[$f]);
    $f = fopen(LICIT_FAJL, "a");
    fwrite($f, implode(';', $licit) . "\n");
    fclose($f);
}
