<?php
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
    <title>Könyvek igénylésének leadása!</title>
</head>
<body>
    <h1 style="text-align: center;">Itt igényelhet könyveket!</h1>
    <h3 style="text-align: center;">Az ön adatai</h3>
    <form style='text-align:center;' action='rendles_ir.php' method='post' enctype='multipart/form-data' target='kisablak'>
    <div class="on-adatai">
        <label for="nev">Adja meg a nevét!</label><br>
        <input type="text" name="nev" value="Beton"><br><br>
        <label for="email">Adja meg az e-mail címét</label><br>
        <input type="text" name="email" value="example@anymail.com"><br><br>
        <label for="cell">Adja meg a telefonszámát</label><br>
        <input type="tel" name="cell" value="+36"><br><br>
    </div>

    <div id="cegadat">
        <label for="iname">Intézmény neve</label><br>
        <input type="text" name="iname" value="Őszi Napsugár Idősek Otthona"><br><br>
        <label for="city">Intézmény tartózkodása</label><br>
        <input type="text" name="city" value="Budapest Kispesti út 12"><br><br>
    </div>
    <div id="konyvinfo">
        <label for="kcim">Könyv címe</label><br>
        <input type="text" name="kcim"><br><br>
        <label for="mennyiseg">Adja meg mennyi könyvet szeretne</label><br>
        <input type="number" name="mennyiseg" max="10" value="Max 10 darab kony lehetséges">

    <div>
    <label for="captcha" style="font-weight:bold";>Captcha</label><br> 
    Mennyi tizen<?=$szj[$ca];?> + <?=$szj[$cb];?>? <input name='captcha' maxlength=2><br><br><br>
    <input type='submit' value='Űrlap beküldése'>

    </form>
    
</body>
</html>



