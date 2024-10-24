<?php
    function verificarFecha(){
        $fecha=$_POST['fecha'];
        $patron='/^([0-9]{2}[\/]){2}[0-9]{4}/';
        if (preg_match($patron,$fecha)) {
            $fecha=explode("/",$fecha);
            switch ($fecha[1]) {
                case '01':
                case '03':
                case '05':
                case '07':
                case '08':
                case '10':
                case '12':
                    if ($fecha[0]<=31) {
                        print "Es una fecha válida.";
                    }else {
                        print "No es una fecha válida.";
                    }
                    break;
                case '04':
                case '06':
                case '09':
                case '11':
                    if ($fecha[0]<=30) {
                        print "Es una fecha válida.";
                    }else {
                        print "No es una fecha válida.";
                    }
                    break;
                case '02':
                    if (($fecha[2]%4==0&&$fecha[2]%100!=0)||($fecha[2]%4==0&&$fecha[2]%400==0)) {
                        if ($fecha[0]<=29) {
                            print "Es una fecha válida.";
                        }else {
                            print "No es una fecha válida.";
                        }
                    }else if ($fecha[0]<=28) {
                        print "Es una fecha válida.";
                    }else{
                        print "No es una fecha válida.";
                    }
                    break;
                default:
                    print "No es una fecha válida.";
                    break;
            }
        } else {
            print "No es una fecha válida.";
        }
        
    }
    verificarFecha();
?>