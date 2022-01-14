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
    include ('./src/Forms/FormType.php');

    ?>

    <h1>Surfresort-Buchung</h1>
    <?php

    $form = new FormType('post');

    $form->setAttributes([
            'novalidate'=>'novalidate'
    ])
        ->addInput('Vorname','firstname','text',[
            'required' => 'required'
    ])
        ->addInput('Nachname','lastname','text')
        ->addInput('Passwort','password','password')
        ->addInput('Straße und Hausnummer','address','text')
        ->addInput('Postleitzahl','plz','text')
        ->addInput('Ort','city','text')
        ->addInput('Anreise','arrival','date')
        ->addInput('Abreise','departure','date')
        ->addButton('Absenden','submit','submit')
    ;

    echo $form->render();

    ?>


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