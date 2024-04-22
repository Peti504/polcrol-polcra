<?

    $adb = mysqli_connect("localhost","root","12345678","konyvespolc");

    function randomstring( $h=10 )
    {
        $c = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        
        $s = "";

        for($i=1; $i<=$h; $i++)
        {
            $m = rand         (0,61);
            $s.= substr( $c, $m, 1 );
        }

        return $s;
    }

?>