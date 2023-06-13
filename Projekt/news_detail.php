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
    <div id="header">
        <h1>News der IMS Basel</h1>

        <div id="menu">
            <ul>
                <li><a href="./login.php">Login</a></li>
                <li><a href="./archive.php">Archive</a></li>
                <li><a href="./singeup.php">Anmelden</a></li>
                

            </ul>
        </div>
    </div>
    <div>
    <h3 id="titel">News der IMS Basel</h3>
<?php
// Assuming you have the database connection in $conn

if (isset($_GET['newsID'])) {
    $newsID = $_GET['newsID'];

    // Retrieve the news details based on the newsID
    $stmt = $conn->prepare("SELECT n.titel, n.inhalt, n.gueltigVon, n.gueltigBis, n.erstelltam, n.kid, n.link, n.bild, k.kategorie AS kategorie_name FROM news AS n INNER JOIN kategories AS k ON n.kid = k.kid WHERE n.newsID = ?");
    $stmt->bind_param("i", $newsID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display the news details
        echo "<h1>" . $row['titel'] . "</h1>";
        echo "<p>Kategorie: " . $row['kategorie_name'] . "</p>";
        echo "<p>Gültig von: " . $row['gueltigVon'] . "</p>";
        echo "<p>Gültig bis: " . $row['gueltigBis'] . "</p>";
        echo "<p>Erstellt am: " . $row['erstelltam'] . "</p>";
        echo "<p>Inhalt: " . $row['inhalt'] . "</p>";
        echo "<p>Link: <a href='" . $row['link'] . "'>" . $row['link'] . "</a></p>";
        echo "<img src='" . $row['bild'] . "' alt='Bild zur News'>";

    } else {
        echo "<p>News nicht gefunden.</p>";
    }

    $stmt->close();
} else {
    echo "<p>Ungültige Anfrage.</p>";
}
?>


</div>
    <div id="impressum">
         Impressum:<br/><br/> Herausgeber: <br/>Robin Rütter <br/>Rüchiweg 21 <br/>CH-4106 Therwil <br/>E-Mail: robin.ruetter@bluewin.ch <br> 
    </div>
   
</body>

</html>