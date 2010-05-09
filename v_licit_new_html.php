<?php 
$title="Új licit: $lakas[id]. lakás &bull; Szív-Árv(m)ány lakópark";
include("header.php");
include_once("view_helpers.php");
?>

    <h1>Új licit: <?php echo $lakas['id'] ?>. lakás</h1>
<p>
<a href="?c=lakas&action=show&id=<?php echo $lakas['id'] ?>">&lt;&lt; Vissza</a>
</p>

<?php 
if (isset($hibak)) {
    echo "<div class=\"hibak\"><ul>";
    foreach ($hibak as $f => $hiba) {
        echo "<li>$hiba</li>";
    }
    echo "</ul></div>";
}
?>
    <form method="post" action="?c=licit&action=create&id=<?php echo $lakas['id'] ?>">

<table>
<?php
global $m_licit_fields;  
foreach ($m_licit_fields as $f => $t) {
    if ($t) {
        $v = $licit[$f];
        if ($f == 'ar') $v = penz($v);
        echo "<tr><td><label for=\"$f\">$t</label></td><td><input type=\"text\" name=\"$f\" size=\"30\" value=\"".htmlspecialchars($v)."\"/></td></tr>";
    }
}

?>
<tr><td colspan="2"><input type="submit" value="Licitálok!" /></td></tr>
</table>

<?php include("footer.php"); 
