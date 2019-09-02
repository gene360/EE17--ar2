    <?php
    /*
    * PHP version 7
    * @category   PHP Grunder
    * @author     Gene Helli 
    * @license    PHP CC
    */
    ?>
<?php
    
    echo "<h1>";
    echo "Hello World";
    echo "</h1>";

    /* Nu testar vi enkel fnutt */
    echo "<h2>";
    echo 'Hello It\'s Nice To See You';
    echo "</h2>";

    /* Skapar några variabler */
    $namn = "Gene";
    $mittEfternamn = " Helli";
    $ålder = 18;
    $gatuAdress = "Nordostpassagen 32a";

    echo $namn;
    echo $mittEfternamn;
    echo "<br>";

    /* Hur man sätter ihop text */
    echo "Hej, mitt namn är " . $namn . ", mitt efternamn är " . $mittEfternamn . "<br>"; // . betyder +

    /* Hur man sätter ihop text smartast */
    echo "Hej, mitt namn är $namn, jag bor på $gatuAdress <br>"; // Dubbel fnutt

    echo 'Hej, mitt namn är $namn, jag bor på $gatuAdress <br>'; // Ensam Fnutt