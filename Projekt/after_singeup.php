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
    
    
</head>
<body>
    <p>
    <?php
   /*
    
    disused
   
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
        echo "Bitte alle Felder ausfüllen";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if email is valid
    if (!filter_var($_POST['EMail_Adresse'], FILTER_VALIDATE_EMAIL)) {
        echo "Bitte eine gültige E-Mail-Adresse eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >"; 
       
    }
    //check if phone number is valid
    if (!preg_match("/^[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}$/", $_POST['Telefon'])) {
        echo "Bitte eine gültige Telefonnummer eingeben im Vormat 079 999 99 99";
        echo "<br>";
  
        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if PLZ is an integer
    if (!filter_var($_POST['PLZ'], FILTER_VALIDATE_INT)) {
        echo "Bitte eine gültige PLZ eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if PLZ is 4 digits
    if (strlen($_POST['PLZ']) != 4) {
        echo "Bitte eine gültige PLZ eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if Benuzername is 6-20 characters long an string
    if (!preg_match("/^[a-zA-Z0-9]{6,20}$/", $_POST['Benutzername'])) {
        echo "Bitte eine gültige Benutzername eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if Passwort is 8-20 characters long an string
    if (!preg_match("/^[a-zA-Z0-9]{8,20}$/", $_POST['Passwort'])) {
        echo "Bitte eine gültige Passwort eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if Anrede is an string
    if (!preg_match("/^[a-zA-Z]{1,20}$/", $_POST['Anrede'])) {
        echo "Bitte eine gültige Anrede eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if Vorname is an string
    if (!preg_match("/^[a-zA-Z]{1,20}$/", $_POST['Vorname'])) {
        echo "Bitte eine gültige Vorname eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if Nachname is an string
    if (!preg_match("/^[a-zA-Z]{1,20}$/", $_POST['Nachname'])) {
        echo "Bitte eine gültige Nachname eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if Strasse is an string
    if (!preg_match("/^[a-zA-Z]{1,20}$/", $_POST['Strasse'])) {
        echo "Bitte eine gültige Strasse eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if Ort is an string
    if (!preg_match("/^[a-zA-Z]{1,20}$/", $_POST['Ort'])) {
        echo "Bitte eine gültige Ort eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if Land is an string
    if (!preg_match("/^[a-zA-Z]{1,20}$/", $_POST['Land'])) {
        echo "Bitte eine gültige Land eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if EMail_Adresse is an string
    if (!preg_match("/^[a-zA-Z0-9]{1,20}$/", $_POST['EMail_Adresse'])) {
        echo "Bitte eine gültige EMail_Adresse eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }
    //check if EMail_Adresse is already used
    $stmt = $conn->prepare ("select EMail_Adresse from users where EMail_Adresse = ?");
    $stmt->bind_param("s", $EMail_Adressetest);
    $EMail_Adressetest = $_POST['EMail_Adresse'];
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result == $EMail_Adressetest) {

        echo "<a href='singeup.php'>Zurück zum Loginseite</a>";
        echo "<script>window.history.back()</script>";
        die("EMail_Adresse already used");

    }else{
            
        
        }
    //check if EMail_Adresse is valid
    if (!filter_var($_POST['EMail_Adresse'], FILTER_VALIDATE_EMAIL)) {
        echo "Bitte eine gültige EMail_Adresse eingeben";
        echo "<br>";

        echo "<input type=button name = 'go' value=back onclick= window.history.back() >";
        
    }

    
    
   
    //check if username is already used with $stmt
    $stmt = $conn->prepare ("select Benutzername from users where Benutzername = ?");

    $stmt->bind_param("s", $Benutzernametest);
    $Benutzernametest = $_POST['Benutzername'];
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result == $Benutzernametest) {

        echo "<a href='singeup.php'>Zurück zum Loginseite</a>";
        echo "<script>window.history.back()</script>";
        die("Username already used");

    }else{
        
       
    }
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
        echo "<a href='login.php'>Zurück zum Loginseite</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
    */
    ?>
    </p>
    </div>
    <div>
    <p>this is not used</p>
    </div>
</body>
</html>