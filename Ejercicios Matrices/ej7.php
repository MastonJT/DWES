<?php
    $num=$_POST['dni'];
    switch ($num%23) {
        case 0:print "La letra del DNI ".$num." es T.";break;
        case 1:print "La letra del DNI ".$num." es R.";break;
        case 2:print "La letra del DNI ".$num." es W.";break;
        case 3:print "La letra del DNI ".$num." es A.";break;
        case 4:print "La letra del DNI ".$num." es G.";break;
        case 5:print "La letra del DNI ".$num." es M.";break;
        case 6:print "La letra del DNI ".$num." es Y.";break;
        case 7:print "La letra del DNI ".$num." es F.";break;
        case 8:print "La letra del DNI ".$num." es P.";break;
        case 9:print "La letra del DNI ".$num." es D.";break;
        case 10:print "La letra del DNI ".$num." es X.";break;
        case 11:print "La letra del DNI ".$num." es B.";break;
        case 12:print "La letra del DNI ".$num." es N.";break;
        case 13:print "La letra del DNI ".$num." es J.";break;
        case 14:print "La letra del DNI ".$num." es Z.";break;
        case 15:print "La letra del DNI ".$num." es S.";break;
        case 16:print "La letra del DNI ".$num." es Q.";break;
        case 17:print "La letra del DNI ".$num." es V.";break;
        case 18:print "La letra del DNI ".$num." es H.";break;
        case 19:print "La letra del DNI ".$num." es L.";break;
        case 20:print "La letra del DNI ".$num." es C.";break;
        case 21:print "La letra del DNI ".$num." es K.";break;
        case 22:print "La letra del DNI ".$num." es E.";break;
        
        default:
            # code...
            break;
    }
?>