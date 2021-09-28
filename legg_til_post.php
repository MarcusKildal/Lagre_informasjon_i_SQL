<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lagre informasjon i SQL.</h1>
    <p>Postnummer, Poststed, Fornavn</p>
    <form action="oversikt_over_boker.php" method="get">
        <input type="text" value="Max 4 tall" name="postnummer">
        <input type="text" value="Poststed" name="poststed">
        <input type="text" value="Navn" name="fornavn">
        <input type="submit" name="knapp">
    </form>


    <?php


    // Tilkoblingsinformasjon
    $tjener = "localhost";
    $brukernavn = "root";
    $passord = "root";
    $database = "Bibliotek"; //Endre på denne til din database

    // Opprette en kobling
    $kobling = new mysqli($tjener, $brukernavn, $passord, $database);

    // Sjekk om koblingen virker
    if($kobling->connect_error) {
        die("Noe gikk galt: " . $kobling->connect_error);
    } else {
        // echo "Koblingen virker.<br>";
    }

    // Angi UTF-8 som tegnsett
    $kobling->set_charset("utf8");



    // Med linjeskift for 1 tabell
    $sql = "SELECT * FROM Laaner
            JOIN Post ON Laaner.Post_postnummer = Post.postnummer
            "; //Skriv din sql kode her
    $resultat = $kobling->query($sql);

    echo"<ol>";
    while($rad = $resultat->fetch_assoc()) {
        $postnummer = $rad["postnummer"]; //Skriv ditt kolonnenavn her
        $poststed = $rad["poststed"];
        $fornavn = $rad["fornavn"]; //Skriv ditt kolonnenavn her
        // $boktittel = $rad["tittel"];

        echo "<li>$postnummer &nbsp $poststed &nbsp $fornavn</li>";
    }
    echo"</ol>";
    ?>
</body>
</html>