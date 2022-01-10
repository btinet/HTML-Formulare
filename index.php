<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formlulare</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body class="container">
<?php
include ('menu.php');
?>
<h1>Formulare</h1>
<p>POST-Formular</p>
<form method="post">
    <label for="text_input">Texteingabe</label>
    <input type="text" id="text_input" name="text" required>

    <label for="password_input">Passworteingabe</label>
    <input type="password" id="password_input" name="passwort">

    <button type="submit">Absenden</button>
</form>
<p>GET-Formular</p>
<form method="get">
    <label for="text_input">Texteingabe</label>
    <input type="text" id="text_input" name="text" required>

    <label for="password_input">Passworteingabe</label>
    <input type="password" id="password_input" name="passwort">

    <label>
        <input type="checkbox" value="1" name="agb_ok">
        Einverstanden?
    </label>

    <label>
        Auswahl
        <select name="choice">
            <option selected>Bitte auswählen</option>
            <option value="ice">Eis</option>
            <option value="coffee">Kaffee</option>
            <option value="bread">Brot</option>
        </select>
    </label>

    <button type="submit">Absenden</button>
</form>
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
<h3>GET-Variablen:</h3>
<ul>
    <?php
    if(!empty($_GET))
    {
        foreach ($_GET as $key => $value)
        {
            if(!empty($value))
            {
                echo "<li><b>{$key}:</b> $value</li>";
            }
        }
    } else {
        echo '<li>Keine GET-Variable vorhanden!</li>';
    }
    ?>
</ul>
</body>
</html>