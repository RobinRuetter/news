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

    // Retrieve the current news ordered by the newest first
    $stmt = $conn->prepare("SELECT n.newsID, n.titel, n.bild, n.gueltigBis, k.kategorie FROM news AS n INNER JOIN kategories AS k ON n.kid = k.kid WHERE n.gueltigBis >= NOW() ORDER BY n.erstelltam DESC");
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any current news
    if ($result->num_rows > 0) {
        echo "<h2>Aktuelle News</h2>";

        while ($row = $result->fetch_assoc()) {
            echo "<div class='news'>";
            echo "<a href='news_detail.php?newsID=" . $row['newsID'] . "'><h3>" . $row['titel'] . "</h3></a>";
            echo "<img src='" . $row['bild'] . "' alt='Bild zur News'>";
            echo "<p>Kategorie: " . $row['kategorie'] . "</p>";
            echo "</div>";
        }
    } else {
    echo "<p>Keine aktuellen News verfügbar.</p>";
    }

    $stmt->close();
    ?>

<!-- Kategorie-Filter -->
<h2>Nach Kategorie filtern</h2>
<form action="" method="post">
    <label for="category">Wähle eine Kategorie:</label>
    <select name="category" id="category">
        <option value="">Alle Kategorien</option>
        <!-- Populate the options with the specific categories -->
        <option value="1">Schule</option>
        <option value="2">Freizeit</option>
        <option value="3">Sport</option>
        <option value="4">Sonstiges</option>
    </select>
    <input type="submit" name="filter" value="Filtern">
</form>


<?php
// Filter the news by category
if (isset($_POST['filter'])) {
    $category = $_POST['category'];

    // Check if the user has selected a category
    if ($category != "") {
        $stmt = $conn->prepare("SELECT n.newsID, n.titel, n.bild, n.gueltigBis, k.kategorie FROM news AS n INNER JOIN kategories AS k ON n.kid = k.kid WHERE n.gueltigBis >= NOW() AND n.kid = ? ORDER BY n.erstelltam DESC");
        $stmt->bind_param("i", $category);
    } else {
        $stmt = $conn->prepare("SELECT n.newsID, n.titel, n.bild, n.gueltigBis, k.kategorie FROM news AS n INNER JOIN kategories AS k ON n.kid = k.kid WHERE n.gueltigBis >= NOW() ORDER BY n.erstelltam DESC");
    }

    $stmt->execute();
    $result = $stmt->get_result();
    // Check if there are any news
    if ($result->num_rows > 0) {
        echo "<h2>Gefilterte News</h2>";

        while ($row = $result->fetch_assoc()) {
            echo "<div class='news'>";
            echo "<a href='news_detail.php?newsID=" . $row['newsID'] . "'><h3>" . $row['titel'] . "</h3></a>";
            echo "<img src='" . $row['bild'] . "' alt='Bild zur News'>";
            echo "<p>Kategorie: " . $row['kategorie'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Keine aktuellen News verfügbar.</p>";
    }}
    ?>


    </div>
    <div id="impressum">
         Impressum:<br/><br/> Herausgeber: <br/>Robin Rütter <br/>Rüchiweg 21 <br/>CH-4106 Therwil <br/>E-Mail: robin.ruetter@bluewin.ch <br> 
    </div>
   
</body>

</html>