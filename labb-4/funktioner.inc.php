<?php
function vara($bilden) {

    /* Plocka ut vara och pris */
    $delar1 = explode('.', $bilden);

    /* Dela upp efter */
    $delar2 = explode('-', $delar1[0]);

    /* Plocka ut sista delen = priset */
    array_pop($delar2);

    /* slå ihop övriga delar */
    $vara = implode(' ', $delar2);

    return $vara;
}
function pris($bilden) {

    /* Plocka ut vara och pris */
    $delar1 = explode('.', $bilden);

    /* Dela upp efter */
    $delar2 = explode('-', $delar1[0]);

    /* Plocka ut sista delen = priset */
    $pris = array_pop($delar2);

    /* slå ihop övriga delar */
    $pris = array_pop($delar2);

    return $pris;
}
?>