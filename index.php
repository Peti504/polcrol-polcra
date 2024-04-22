<?php
    session_start();
    date_default_timezone_set("Europe/Budapest");
    include("adbkapcsolat.php");
    
    if(isset($_SESSION['uid'])){ 
       //print"1";
        $belepve=1 ;
        mysqli_query($adb, "
                INSERT INTO naplo(nid,              nurl,      ndatum,             nip,            nlid)
                        VALUES('', '$_SERVER[REQUEST_URI]', NOW(),    '$_SERVER[REMOTE_ADDR]', '$_SESSION[uid]');"
            );
    } 

    else    

     {
        //print"2";
        $belepve=0;
        mysqli_query($adb, "
        INSERT INTO naplo(nid,              nurl,      ndatum,             nip,            nlid)
                VALUES('', '$_SERVER[REQUEST_URI]', NOW(),    '$_SERVER[REMOTE_ADDR]', -1);"
    );
    };

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>
    <?php

    if( isset($_GET['p'])) $p=$_GET['p'] ; else $p="" ;

    if($p==""               )   print "Kezdöoldal"                                ; else
    if($p=="rolunk"         )   print "Rólunk"                                    ; else
    if($p=="termekek"       )   print "Rendelkezésre álló könyveink"              ; else
    if($p=="forum"          )   print "Fórumok"                                   ; else
    if($p=="kapcs"          )   print "Elérhetőségeink"                           ; else
    if($p=="login"          )   print "Belépés"                                   ; else
    if($p=="prof"           )   print "Profil"                                    ; else
    if($p=="reg"            )   print "Regisztráció"                              ; else
    if($p== "rend"          )   print "Könyvek igénylése"                         ; else
    if($p== "kuld"          )   print "Könyvek küldése adomány számára"           ; else
    if($p== "admin"         )   print "Adminpanel"                                ; else
    if($p== "vizsgalat"     )   print "Rendelesek ellenörzése"                    ; else
                                print "Ajajj!"                                    ;
    ?>
    </title>
</head>
<body>
    <?php
    $admin = "none";
    if($_SESSION["ujog"] == "Admin") $admin="inline";
    if(!$belepve) print "
    <div id='menu'>
       
        <a href='./'                >   Kezdőoldal      </a> 
        <a href='./?p=rolunk'       >   Rólunk          </a> 
        <a href='./?p=termekek'     >   Termékeink      </a>  
        <a href='./?p=forum'        >   Fórum           </a> 
        <a href='./?p=kapcs'        >   Kapcsolat       </a> 
        <div id='login' >
        <a href='./?p=login'        >   Belépés         </a>
         </div>
     </div>  
    " ;
    
    else print "
    <div id='menu'>
        
            
        <a href='./'                >   Kezdőoldal      </a> 
        <a href='./?p=termekek'     >   Termékeink      </a> 
        <a href='./?p=forum'        >   Fórum           </a> 
        <div class='dropdown'>
            <button class='dropbtn'>Elérhetőségeink/Adományozás</button>
            <div class='dropdown-content'>
              <a href='./?p=rolunk'>Információ rólunk</a>
              <a href='./?p=kapcs'>Kapcsolataink</a>
              <a href='./?p=rend'>Könyvek igénylése</a>
              <a href='./?p=kuld'>Könyvek adományozása</a>

            </div>
        </div>
        <a id='profil' href='./?p=prof'         >   Profil          </a>
        <a style='display:$admin;' id='admin' href='./?p=admin'        >   Admin           </a> 
        </div>  
        
    " ;
    ?> 
    <div id=tartalom>
    <?php

    // print_r( $_GET )    ;
    if( isset($_GET['p'])) $p=$_GET['p'] ; else $p="" ;

    if($p==""               )   include("kezdooldal.php")                           ; else
    if($p=="rolunk"         )   include("rolunk.php")                               ; else
    if($p=="rend"           )   include("rendelesfom.php")                          ; else
    if($p=="kuld"           )   include("konyvkuldes_form.php")                     ; else
    if($p=="termekek"       )   include("konyvek.php")                              ; else
    if($p=="forum"          )   include("vendegkonyv_form.php")                     ; else
    if($p=="adom"           )   include("adomynozas_form.php")                      ; else
    if($p=="kapcs"          )   include("elerhetoseg.php")                          ; else
    if($p=="login"          )   include("login_form.php")                           ; else
    if($p=="prof"           )   include("profil.php")                               ; else
    if($p=="reg"            )   include("reg_form.php")                             ; else
    if($p=="adatmod"        )   include("adatmod_form.php")                         ; else
    if($p=="jelszomod"      )   include("jelszomod_form.php")                       ; else
    if($p=="profilmod"      )   include("profilkepmod_form.php")                    ; else
    if($p=="vizsgalat"      )   include("vizsgalat_form.php")                       ; else
    if($p=="admin"          )   include("adminpanel.php")                      ;else
    
    
                                print "<h1>404 - A kért oldal nem található</h1>"   ;
    
    

    ?>
    <?php

        $fajlnev = date("Ymd") . ".txt" ;
            
        if ( !file_exists($fajlnev) ) 
        {
            $fp = fopen ($fajlnev , "w") ; // létrehozás
            fwrite($fp , "0") ;
            fclose($fp) ;
        }

        //$n = 528 ;

        $fp = fopen ($fajlnev , "r") ; // olvasásra megnyit
        $n = fread($fp , filesize($fajlnev)) ;
        fclose($fp) ;

        if(!isset($_SESSION['eg']))
        {
            $n++ ;

            $fp = fopen ($fajlnev , "w") ; // felülírás
            fwrite($fp , $n) ;
            fclose($fp) ;

            $_SESSION['eg'] = "kábel" ;
        }
        
        print "<div class = 'footer'>
        <p>Az oldalt eddig $n látogató látta.</p>
        </div>
        " ;
    
    mysqli_close($adb);
    ?>
    
    </div> 
    <iframe style="display: none;" name='kisablak' x_width=0 x_height=0 x_frameborder=0></iframe>
</body>
</html>
