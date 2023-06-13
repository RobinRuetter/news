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
                <li><a href="./loged_in_archive.php">Archiv</a></li>
                <li><a href="./loged_in_index.php">Home</a></li>
                <li><a href="./logout.php">Logout</a></li>
                

            </ul>
        </div>
    </div>
    <div>
    <h3 id="titel">News der IMS Basel</h3>
<?php

//start session
session_start();
if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)){
        
}else{
    echo "Sie sind nicht eingeloggt";
    echo "<br>";
    //redirect to login page after 5 seconds
    header("refresh:5; url=Lo_I_S_W_W.php");
    echo "Sie werden in 5 Sekunden weitergeleitet";
    die();
    
}
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
        die();
    }

    $stmt->close();
} else {
    echo "<p>Ungültige Anfrage.</p>";
    die();
}

    //get autor of news
    $autorStmt = $conn->prepare("SELECT autor FROM news WHERE newsID = ?");
    $autorStmt->bind_param("i", $_GET['newsID']);
    $autorStmt->execute();
    $autorResult = $autorStmt->get_result();
    $autorRow = $autorResult->fetch_assoc();
    $autor = $autorRow['autor'];
    
//if the news if from the user who is logged in, he can edit or delete the news on this page
if (isset($_SESSION['id'])) {
    if ($_SESSION['id'] == $autor) {
        //display edit button if presst open form to eddit news
        echo "<form action='' method='post'>";
        echo "<input type='submit' name='edit' value='Edit'>";
        echo "</form>";
        //if edit button is pressed
        if (isset($_POST['edit'])) {
            //open form to edit news
            echo "<form action='' method='post'>";
            echo "<input type='text' name='titel' value='" . $row['titel'] . "'><br>";
            echo "<input type='textarea' name='inhalt' value='" . $row['inhalt'] . "'><br>";
            echo "<input type='text' name='gueltigVon' value='" . $row['gueltigVon'] . "'><br>";
            echo "<input type='text' name='gueltigBis' value='" . $row['gueltigBis'] . "'><br>";
            echo "<input type='text' name='link' value='" . $row['link'] . "'><br>";
            echo "<input type='text' name='bild' value='" . $row['bild'] . "'><br>";
            echo "<input type='submit' name='update' value='update'>";
            echo "</form>";
        }
        //if save button is pressed
        if (isset($_POST['update'])) {
            $updateID = $newsID;
            $title = $_POST['titel'];
            $content = $_POST['inhalt'];
            $gueltigVon = $_POST['gueltigVon'];
            $gueltigBis = $_POST['gueltigBis'];
            $link = $_POST['link'];
            $bild = $_POST['bild'];
        
            // Update the news item in the database
            $updateStmt = $conn->prepare("UPDATE news SET titel = ?, inhalt = ?, gueltigVon = ?, gueltigBis = ?, link = ?, bild = ? WHERE newsid = ?");
            $updateStmt->bind_param("ssssssi", $title, $content, $gueltigVon, $gueltigBis, $link, $bild, $updateID);
            $updateStmt->execute();
            $updateStmt->close();
            //reload page
            header("Refresh:0");
        }
        //display delete button if presst delete news
        echo "<form action='' method='post'>";
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "</form>";
        //if delete button is pressed
        if (isset($_POST['delete'])) {
            //delete news
            $deleteStmt = $conn->prepare("DELETE FROM news WHERE newsid = ?");
            $deleteStmt->bind_param("i", $newsID);
            $deleteStmt->execute();
            $deleteStmt->close();
            //redirect to news page
            header("Location: ./news.php");
        }
    }
}


?>


</div>
    <div id="impressum">
         Impressum:<br/><br/> Herausgeber: <br/>Robin Rütter <br/>Rüchiweg 21 <br/>CH-4106 Therwil <br/>E-Mail: robin.ruetter@bluewin.ch <br> 
    </div>
   
</body>

</html>