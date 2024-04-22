<?
    print_r($_POST);
    print "<hr>";
    print_r($_FILES);


    if(!file_exists("vendegkonyv.txt")) 
    {
        $fp = fopen("vendegkonyv.txt", "w");
        fclose($fp);
    }

    if($_POST['vendegnev']==""){
        die("<script>alert('Nem adtad meg a nvedet! \\r\\Add meg a neved!')</script>") ;
    }

    if($_POST['uzenet']==""){
        die("<script>alert('Nem írtál üzenetet! \\r\\nÍrj valamit!')</script>") ;
    }

    $_POST = str_replace(";" , "," , $_POST) ;
    $uzenet = $_POST['uzenet'] ;
    $uzenet = str_replace("\r\n" , "<br>" , $uzenet) ;

    date_default_timezone_set(Budapest/Europe);
   /* $fafjlnev = $_FILES['csatolmany']['name']; Nem hasznájuk mert nem egy dimenziós */
   $csatolmany = $_FILES['csatolmany'];
   $fajlnev = $csatolmany['name'];
   $kiterj = substr($fajlnev , strrpos($fajlnev,"."));
   $ujnev = date("YmdHis") . $kiterj ;
    $kiiras = date("Y.m.d") . ";" . $_POST['vendegnev'] . ";" . $uzenet . ";" .  $fajlnev . ";" . $ujnev . "\r\n";

    move_uploaded_file($csatolmany['tmp_name'],"./FILES/" . $ujnev);

    $fp = fopen("vendegkonyv.txt", "a");
    fwrite( $fp, $kiiras);
    fclose($fp);


?>