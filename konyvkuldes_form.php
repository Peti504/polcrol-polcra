
<?php
    //Capcha(nem vagyok robot) az oldal aljára
    $szj            = array("", "egy", "kettő", "három", "négy", "öt", "hat", "hét", "nyolc", "kilenc");
    $ca             = rand(1, 9);
    $cb             = rand(2, 9);
    $_SESSION['cc'] = 10+$ca+$cb   ;
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Könyvek küldésre adomnyány számára!</title>
</head>
<body>
    <h1 style="text-align: center;">Itt lehet adomnyányozni könyveket</h1>
    <h3 style="text-align: center;">Az ön adatai</h3>
    <form style='text-align:center;' action='konyvkuldes_ir.php' method='post' enctype='multipart/form-data' target='kisablak'>
    <div class="on-adatai">
        <label for="B_Nev">Adja meg a nevét!</label><br>
        <input type="text" name="B_Nev" value="Beton"><br><br>
        <label for="B_Email">Adja meg az e-mail címét</label><br>
        <input type="text" name="B_Email" value="kis.janos@example.com"><br><br>
        <label for="B_Cell">Adja meg a telefonszámát</label><br>
        <input type="tel" name="B_Cell" value="+36"><br><br>
    </div>
    <div id="konyvinfo">
        <label for="KB_Cim">Könyv/Könyvek címe</label><br>
        <input type="select" name="KB_Cim"><br><br>
        <label for="KB_Szerzo">A könyv szerzője</label><br>
        <input type="text" name="KB_Szerzo"><br><br>
        <label for="B_Mennyiseg">Adja meg mennyi könyvet szeretne</label><br>
        <input type="number" name="B_Mennyiseg" max="10" value="Max 10 darab kony lehetséges">

    <div>
    <label for="captcha" style="font-weight:bold";>Captcha</label><br> 
    Mennyi tizen<?=$szj[$ca];?> + <?=$szj[$cb];?>? <input name='captcha' maxlength=2><br><br><br>
    <input type='submit' value='Űrlap beküldése'>

    </form>
    
</body>
</html>


