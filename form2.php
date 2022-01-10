<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formlulare</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<?php
include ('menu.php');
?>
<div class="container">
    <h1>Surfresort-Buchung</h1>
    <form method="post">
        <label>
            Name
            <input type="text" name="lastname" value="<?= $_POST['lastname'] ?: '' ?>">
        </label>
        <label>
            Vorname
            <input type="text" name="firstname" value="<?= $_POST['firstname'] ?: '' ?>">
        </label>
        <label>
            Adresse
            <input type="text" name="address_1" value="<?= $_POST['address_1'] ?: '' ?>">
        </label>
        <label>
            Adresse 2
            <input type="text" name="address_2" value="<?= $_POST['address_2'] ?: '' ?>">
        </label>
        <label>
            Anreise
            <input type="date" name="date_arrival">
        </label>
        <label>
            Abreise
            <input type="date" name="date_departure">
        </label>
        <button type="submit">Absenden</button>
    </form>
</div>


<h2>Formularausgabe</h2>
<h3>POST-Variablen:</h3>
<ul>
    <?php
    if(!empty($_POST))
    {
        foreach ($_POST as $key => $value)
        {
            if(!empty($value))
            {
                echo "<li><b>{$key}:</b> $value</li>";
            }
        }
    } else {
        echo '<li>Keine POST-Variable vorhanden!</li>';
    }
    ?>
</ul>

</body>
</html>