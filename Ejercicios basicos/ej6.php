<?php
    $rand1=rand(1,6);
    $dado1=file_get_contents("img/".$rand1.".svg");
    $rectangulo="<br/><svg width=600 height=100>
                    <rect width=100 height=100 fill=white stroke=black></rect>
                    <text x=25 y=75 fill=lightgrey font-family=arial font-size=75>1</text>
                    <rect width=100 height=100 x=99 fill=white stroke=black></rect>
                    <text x=125 y=75 fill=lightgrey font-family=arial font-size=75>2</text>
                    <rect width=100 height=100 x=198 fill=white stroke=black></rect>
                    <text x=225 y=75 fill=lightgrey font-family=arial font-size=75>3</text>
                    <rect width=100 height=100 x=297 fill=white stroke=black></rect>
                    <text x=325 y=75 fill=lightgrey font-family=arial font-size=75>4</text>
                    <rect width=100 height=100 x=396 fill=white stroke=black></rect>
                    <text x=425 y=75 fill=lightgrey font-family=arial font-size=75>5</text>
                    <rect width=100 height=100 x=495 fill=white stroke=black></rect>
                    <text x=525 y=75 fill=lightgrey font-family=arial font-size=75>6</text>
                    <circle r=30 cx=".($rand1-1)."50 cy=50 fill=red stroke=black stroke-width=2></circle>
                </svg>";
    print $dado1;
    print $rectangulo;
?>