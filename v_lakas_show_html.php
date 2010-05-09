<?php 
$title="$lakas[id]. lakás &bull; Szív-Árv(m)ány lakópark";
include("header.php");
include_once("view_helpers.php");
?>

    <h1><?php echo $lakas['id'] ?>. lakás</h1>

<p>
<a href=".">&lt;&lt; Vissza a főoldalra</a>
</p>

<dl>
<dt>Méret</dt><dd><?php echo $lakas['nm'] ?> m<sup>2</sup></dd>
<dt>Aktuális ár</dt><dd><?php echo penz($lakas['ar']) ?></dd>
</dl>

<h2>Licitek</h2>

<p>
<a href="?c=licit&action=new&id=<?php echo $lakas['id'] ?>">Licitálás!</a>
</p>

<?php 
if ($licitek) :
    $licitek = array_reverse($licitek);
?> 
<table>
<tr>
<th>Név</th>
<th>Sz.ig. szám</th>
<th>Telefonszám</th>
<th>Licit</th>
</tr>
<?php
foreach ($licitek as $l) {
    echo "<tr><td>$l[nev]</td><td>$l[szig]</td><td>$l[tel]</td><td>". penz($l['ar']) . "</td></tr>";
}

?>
</table>
<?php
else:
    echo "Nincsenek licitek.";
endif;
?>


<?php include("footer.php"); 
