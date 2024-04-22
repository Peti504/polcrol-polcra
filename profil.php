<? 

if(!$belepve) die("
    
<h2>Az oldal megtekintéséhez be kell jelentkezned!</h2>

");
?>
<h1>A profilod</h1> <br>


<h2><?= $_SESSION['unev'];?></h2>
<div class='doboz'>

         <a href='./?p=adatmod'  >    Adatok megváltoztása    </a><br>
         <a href='./?p=jelszomod'>    Jelszó megváltoztatása   </a><br>
         <a href='./?p=profilmod'>    Profilkép szerkesztése   </a> <br>

        
        <br>
         <a href='logout.php'
            target='kisablak'       >   Kilépés         </a></li>
    
</div>