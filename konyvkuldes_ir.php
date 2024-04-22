<?
    session_start();

    print_r($_POST);

    include("adbkapcsolat.php");
   
    mysqli_query($adb, "
            INSERT INTO beszerzes    (B_ID ,  B_Date,  B_Name,          BK_CIM,         B_Mennyiseg          ) 
            VALUES                  (NULL,  NOW(), '$_POST[B_Nev]',  '$_POST[KB_Cim]',  '$_POST[B_Mennyiseg]');
    ");
     mysqli_query($adb,"
    INSERT INTO   konyvek (K_ID,       K_Szerzo,        K_Cim,          K_Statusz, K_Darabszam    )
    VALUES                (NULL, '$_POST[KB_Szerzo]',   '$_POST[KB_Cim]',   '0',     '$_POST[B_Mennyiseg]')");  
     
    print "<script> 
    alert('Teljes szívvel köszönjük a könyveket!')
    parent.location.href='./'
</script>
";
    ?>