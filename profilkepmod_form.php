<?php

    if(!$belepve) die("
    
    <h2>Az oldal megtekintéséhez be kell jelentkezned!</h2>
    
    ");

    $user = mysqli_fetch_array(mysqli_query($adb,"
                            SELECT * FROM user WHERE uid='$_SESSION[uid]'
                        "));
print isset($adb);
//print_r($user);
?>

<h1>Profil - Profilkepmodositas</h1>
<div class='doboz'>
    <h2><?=$_SESSION['unev'];?></h2>

    <form action='profilmod_ir.php' method='post' enctype='multipart/form-data' target='kisablak'>
        <input type='password'  name='upw'      placeholder='Jelszó az ellenőrzéshez'>
        <input type='file'      name='ukep'><br>
        <input type='hidden'    name='ustrid'   value='<?=$user['ustrid'];?>'>                                  <br>
        <hr width=200 style='margin:16px 0px;'>
        <input type='submit' value='Kép modositasa'>
    </form>
</div>
     
