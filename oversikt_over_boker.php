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
        echo "Koblingen virker.<br>";
    }

    // Angi UTF-8 som tegnsett
    $kobling->set_charset("utf8");




    $postnummer = $_GET["postnummer"];
    $poststed = $_GET["poststed"];


    $sql = "INSERT INTO `Post` VALUES ('$postnummer', '$poststed')";

    if($kobling->query($sql)) {
        echo "Spørringen $sql ble gjennomført.";
    } else {
        echo "Noe gikk galt med spøfrringen $sql ($kobling->error).";
    }

    $fornavn = $_GET["fornavn"];
    $postnummer = $_GET["postnummer"];


    $sql = "INSERT INTO `Bibliotek`.`Laaner` (`fornavn`, `Post_postnummer`) VALUES ('$fornavn', '$postnummer')";

    if($kobling->query($sql)) {
        echo "Spørringen $sql ble gjennomført.";
    } else {
        echo "Noe gikk galt med spøfrringen $sql ($kobling->error).";
    }
    header("Location: legg_til_post.php");
?>