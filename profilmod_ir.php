<?php
    session_start();

    print_r($_FILES);

    $ukep = $_FILES['ukep'];
    if($ukep['name']=="") die("<script> alert('Nem adtal meg kepet!')</script>");
    


    
    include("adbkapcsolat.php");
    $user = mysqli_fetch_array(mysqli_query($adb, "SELECT upw FROM user WHERE ustrid='$_POST[ustrid]'"));
    if(md5($_POST['upw'])!=$user['upw'])  
    die("<script> alert('Hibás jelszó!')</script>");
    
    $kepnev = date("YmdHis_") . $_POST['ustrid'] . '_' . randomstring(10) . substr( $ukep['name'] , strrpos($ukep['name'],"."));

    move_uploaded_file($ukep['tmp_name'] , "./profilkep/" . $kepnev);
    
    
    $t = mysqli_query($adb, "
            UPDATE  user
            SET     uprofilkep    =   '$kepnev'
            WHERE   ustrid  =   '$_POST[ustrid]'
    ");

    print "
        <script>
            alert('Az adatok módosítása megtörtént.')
            parent.location.href='./?p=profil'
        </script>
    ";


    mysqli_close($adb);

?>