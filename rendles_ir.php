<?php
    session_start();

    //print_r($_POST);

    include("adbkapcsolat.php");

    if($_POST['nev'] =="")              die("<script> alert('Kérem adja meg a nevét!')</script>");

    if($_POST['cell'] =="")              die("<script> alert('Kérem adja meg a telefonszámát!')</script>");

    if($_POST['email'] =="")              die("<script> alert('Nem adott meg e-mail címet!')</script>");

    if($_POST['iname'] =="")              die("<script> alert('Kérem adja meg az intézmény nevét ahol dolgozik!')</script>");

    if($_POST['city'] =="")              die("<script> alert('Kérem adja meg az intézmény tartózkodási helyét!')</script>");

    if($_POST['kcim'] =="")              die("<script> alert('Nem adott meg konyvcímet!')</script>");

    if($_POST['mennyiseg'] >10)          die("<script> alert('Maximum 10 könyv rendelése engedélyezett egy kérelemben!')</script>");
   
    mysqli_query($adb, "
            INSERT INTO rendeles     (       RI_NEV,            R_Mennyiseg,         RK_NEV ,        R_MAIL,      R_DATE) 
            VALUES                   (   '$_POST[iname]',   '$_POST[mennyiseg]', '$_POST[kcim]' , '$_POST[email]', NOW());
    ");


    mysqli_query($adb,"
    INSERT INTO   intezmenyek (I_ID,       I_Name,        I_Hely    )
    VALUES                    (NULL, '$_POST[iname]',   '$_POST[city]')");  


    mysqli_query($adb,"
    INSERT INTO   konyvek (K_ID,   K_Cim,          K_Statusz, K_Darabszam    )
    VALUES                (NULL,  '$_POST[kcim]',   '1',     '$_POST[mennyiseg]')");  
     
    mysqli_query($adb,"
    INSERT INTO rendelo (RS_ID, RS_Name, RS_Mail, RS_Cell)
    VALUES (NULL, '$_POST[nev]', '$_POST[email]','$_POST[cell]')");
    mysqli_close($adb);

    print "<script> 
                alert('A kérvényt megkaptuk!')
                parent.location.href='./'
            </script>
    ";
?>