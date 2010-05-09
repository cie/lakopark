<?php 
$title="Szív-Árv(m)ány lakópark";
include("header.php");
include_once("view_helpers.php");
?>

<h1>Szív-Árv(m)ány lakópark</h1>

<p>Üdvözli Önt a Szív-Árv(m)ány lakópark internetes licitáló oldala!</p>

<table>
<tr>
<th>Lakás száma</th>
<th>Mérete (m<sup>2</sup>)</th>
<th>Aktuális ár</th>
</tr>
<?php
foreach ($lakasok as $l) {
    echo "<tr><td><a href=\"?id=$l[id]&c=lakas&action=show\">$l[id]</a></td><td>$l[nm]</td><td>". penz($l['ar']) . "</td></tr>";
}

?>
</table>

<?php include("footer.php"); 
