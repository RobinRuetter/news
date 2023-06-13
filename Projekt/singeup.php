<!DOCTYPE html>
<html lang="de">
<html>
    <?php 
    //conect to db
    include ('include.php');
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="colors.css">
    
</head>
<body>
<?php
if (isset ($_POST['submit'])){
    $ausgebe = "";
    //save input to file try.txt
    $myfile = fopen("try.txt", "w") or die("Unable to open file!");
    $txt = $_POST['Benutzername'];
    fwrite($myfile, $txt);
    $txt = $_POST['Passwort'];
    fwrite($myfile, $txt);
    $txt = $_POST['Anrede'];
    fwrite($myfile, $txt);
    $txt = $_POST['Vorname'];
    fwrite($myfile, $txt);
    $txt = $_POST['Nachname'];
    fwrite($myfile, $txt);
    $txt = $_POST['Strasse'];
    fwrite($myfile, $txt);
    $txt = $_POST['PLZ'];
    fwrite($myfile, $txt);
    $txt = $_POST['Ort'];
    fwrite($myfile, $txt);
    $txt = $_POST['Land'];
    fwrite($myfile, $txt);
    $txt = $_POST['EMail_Adresse'];
    fwrite($myfile, $txt);
    $txt = $_POST['Telefon'];
    fwrite($myfile, $txt);
    fclose($myfile);


    //check for empty fields
    if (empty($_POST['Benutzername']) || empty($_POST['Passwort']) || empty($_POST['Anrede']) || empty($_POST['Vorname']) || empty($_POST['Nachname']) || empty($_POST['Strasse']) || empty($_POST['PLZ']) || empty($_POST['Ort']) || empty($_POST['Land']) || empty($_POST['EMail_Adresse']) || empty($_POST['Telefon'])) {
        $ausgebe .= "<br> -Bitte alle Felder ausfüllen";
        
    }
    //check if email is valid
    if (!filter_var($_POST['EMail_Adresse'], FILTER_VALIDATE_EMAIL)) {
        $ausgebe .= "<br> -Bitte eine gültige E-Mail-Adresse eingeben"; 

    }
    //check if phone number is valid
    if (!preg_match("/^[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}$/", $_POST['Telefon'])) {
        $ausgebe .= "<br> -Bitte eine gültige Telefonnummer im Format 079 999 99 99 eingeben";

    }
    //check if PLZ is an integer
    if (!filter_var($_POST['PLZ'], FILTER_VALIDATE_INT)) {
        $ausgebe .= "<br> -Bitte eine gültige PLZ eingeben";

    }
    //check if PLZ is 4 digits
    if (strlen($_POST['PLZ']) != 4) {
        $ausgebe .= "<br> -Bitte eine gültige PLZ eingeben";

    }
    //check if Benuzername is 1-20 characters long
    if (strlen($_POST['Benutzername']) < 1 || strlen($_POST['Benutzername']) > 20) {
        $ausgebe .= "<br> -Bitte einen gültigen Benutzernamen eingeben";

    }


    
    //check if Anrede is Herr oder Frau
    if (!preg_match("/^(Herr|Frau)$/", $_POST['Anrede'])) {
        $ausgebe .= "<br> -Herr Mann oder Frau eingeben";

    }
    //check if Vorname is not empty
    if (empty($_POST['Vorname'])) {
        $ausgebe .= "<br> -Bitte einen Vornamen eingeben";

    }
    //check if Nachname is not empty
    if (empty($_POST['Nachname'])) {
        $ausgebe .= "<br> -Bitte einen Nachnamen eingeben";

    }
    //check if Strasse is not empty
    if (empty($_POST['Strasse'])) {
        $ausgebe .= "<br> -Bitte eine Strasse eingeben";

    }
    //check if PLZ is not empty
    if (empty($_POST['PLZ'])) {
        $ausgebe .= "<br> -Bitte eine PLZ eingeben";

    }
    //check if Ort is not empty
    if (empty($_POST['Ort'])) {
        $ausgebe .= "<br> -Bitte einen Ort eingeben";

    }
    //check if Land is not empty
    if (empty($_POST['Land'])) {
        $ausgebe .= "<br> -Bitte ein Land eingeben";

    }
    //check if EMail_Adresse is not empty
    if (empty($_POST['EMail_Adresse'])) {
        $ausgebe .= "<br> -Bitte eine E-Mail-Adresse eingeben";

    }
    //check if Telefon is not empty
    if (empty($_POST['Telefon'])) {
        $ausgebe .= "<br> -Bitte eine Telefonnummer eingeben";

    }
    //check if PLZ is an integer
    if (!filter_var($_POST['PLZ'], FILTER_VALIDATE_INT)) {
        $ausgebe .= "<br> -Bitte eine gültige PLZ eingeben";

    }
    //check if EMail_Adresse is already used
    $stmt = $conn->prepare ("select EMail_Adresse from users where EMail_Adresse = ?");
    $stmt->bind_param("s", $EMail_Adressetest);
    $EMail_Adressetest = $_POST['EMail_Adresse'];
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result == $EMail_Adressetest) {

        $ausgebe .= "<br> -EMail Adresse already used";

    }
    //check if EMail_Adresse is valid
    if (!filter_var($_POST['EMail_Adresse'], FILTER_VALIDATE_EMAIL)) {
        $ausgebe .= "<br> -Keine gültige E-Mail-Adresse"; 
 
    }

    
    
   
    //check if username is already used with $stmt
    $stmt = $conn->prepare ("select Benutzername from users where Benutzername = ?");

    $stmt->bind_param("s", $Benutzernametest);
    $Benutzernametest = $_POST['Benutzername'];
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result == $Benutzernametest) {

      $ausgebe .= "Benutzername already used"; 
     
    }
    if ( $ausgebe == "" ) {
    //delete spaces at the start and end of the string
    $Benutzername = trim($_POST['Benutzername']);
    $Passwort = trim($_POST['Passwort']);
    $Anrede = trim($_POST['Anrede']);
    $Vorname = trim($_POST['Vorname']);
    $Nachname = trim($_POST['Nachname']);
    $Strasse = trim($_POST['Strasse']);
    $PLZ = trim($_POST['PLZ']);
    $Ort = trim($_POST['Ort']);
    $Land = trim($_POST['Land']);
    $EMail_Adresse = trim($_POST['EMail_Adresse']);
    $Telefon = trim($_POST['Telefon']);
    


    //delete file try.txt
    unlink("try.txt");
    //insert data into db
    $stmt = $conn->prepare ("insert into users (Benutzername, Passwort, Anrede, Vorname, Nachname, Strasse, PLZ, Ort, Land, EMail_Adresse, Telefon ) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_Param("sssssssssss", $Benutzername, $Passwort, $Anrede, $Vorname, $Nachname, $Strasse, $PLZ, $Ort, $Land, $EMail_Adresse, $Telefon);
    
    //get data from form
    $Benutzername = $_POST['Benutzername'];
    $Passwort = $_POST['Passwort'];
    $Passwort = password_hash($Passwort, PASSWORD_DEFAULT);
    $Anrede = $_POST['Anrede'];
    $Vorname = $_POST['Vorname'];
    $Nachname = $_POST['Nachname'];
    $Strasse = $_POST['Strasse'];
    $PLZ = $_POST['PLZ'];
    $Ort = $_POST['Ort'];
    $Land = $_POST['Land'];
    $EMail_Adresse = $_POST['EMail_Adresse'];
    $Telefon = $_POST['Telefon'];
    $stmt->execute();
    //check if querry was successful
    if ($stmt->affected_rows > 0) {
        echo "Neuer Benutzer wurde erfolgreich erstellt";
        echo "<br>";
        echo "<br>";
        //wait 5 seconds
        header("refresh:5; url=login.php");
        echo "Sie werden in 5 Sekunden weitergeleitet";    
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}
else {
    echo $ausgebe;
    echo "<br><br><input type=button name = 'go' value='Zurück um Ihre Eingeben zu Prüfen' onclick= window.history.back() >";
    die();
} }
?>

<div id="header">
        <h1>News der IMS Basel</h1>

        <div id="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="archive.php">Archiv</a></li>
                
            </ul>
        </div>
    </div>
<h3 id="titel">News der IMS Basel</h3>
<div>
<h3 id="titel">Anmelden</h3>
<form action="" method="post">
        <label for="Benutzername">Benutzername*</label><br>
        <input type="text" id="Benutzername" name="Benutzername" value="" placeholder="Benutzername" required><br>
        <label for="Passwort">Passwort*</label><br>
        <input type="password" id="Passwort" name="Passwort" value="" placeholder="Passwort" required><br>
        <label for="Anrede">Anrede*</label><br>
        <input type="text" id="Anrede" name="Anrede" value="" placeholder="Anrede" required><br>
        <label for="Vorname">Vorname*</label><br>
        <input type="text" id="Vorname" name="Vorname" value="" placeholder="Vorname" required><br>
        <label for="Nachname">Nachname*</label><br>
        <input type="text" id="Nachname" name="Nachname" value="" placeholder="Nachname" required><br>
        <label for="Strasse">Strasse*</label><br>
        <input type="text" id="Strasse" name="Strasse" value="" placeholder="Strasse" required><br>
        <label for="PLZ">PLZ*</label><br>
        <input type="text" id="PLZ" name="PLZ" value="" placeholder="PLZ" required><br>
        <label for="Ort">Ort*</label><br>
        <input type="text" id="Ort" name="Ort" value="" placeholder="Ort" required><br>
        <label for="Land">Land*</label><br>
        <input type="text" id="Land" name="Land" value="" placeholder="Land" required><br>
        <label for="EMail_Adresse">EMail Adresse*</label><br>
        <input type="text" id="EMail_Adresse" name="EMail_Adresse" value="" placeholder="EMail Adresse" required><br>
        <label for="Telefon">Telefonnummer*(mit Leerschlägen wie unten)</label><br>
        <input type="text" id="Telefon" name="Telefon" value="" placeholder="079 999 99 99" required><br>
        <input type="submit" value="Anmelden" name="submit">
        <input type="reset" value="Zurücksetzen">
    </form>
    <br>
</div>    


    <div id="impressum">
         Impressum:<br/><br/> Herausgeber: <br/>Robin Rütter <br/>Rüchiweg 21 <br/>CH-4106 Therwil <br/>E-Mail: robin.ruetter@bluewin.ch <br/> <br/> <br/> Inhalt: <br/> <br/> Von verschiedene Benutzern erstellte News. <br/> <br/> <br/>
    </div>
   

</body>
</html>