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

class Form
{
    protected array $items;
    protected array $buttons;
    protected string $method;
    protected string $action;

    public function __construct($method = 'get', $action = false)
    {
        $this->setMethod($method);
        $this->setAction($action);
    }

    public function addInputField($label, $name,$type,array $attributes = []):void
    {
        $formRow = "<input type='{$type}' name='{$name}'";
        if($attributes)
        {
            foreach ($attributes as $attribute => $value)
            {
                $formRow .= " {$attribute}='{$value}' ";
            };
        }
        $formRow .= ">";
        $formLabelRow = "<label>{$label}{$formRow}</label>";
        $this->setItems($formLabelRow);
    }

    public function addButton($label, $name, $type,array $attributes = []):void
    {
        $button = "<button type='{$type}' name='{$name}'";
        if($attributes) {
            foreach ($attributes as $attribute => $value) {
                $button .= " {$attribute}='{$value}' ";
            };
        }
        $button .= ">{$label}</button>";
        $this->setButtons($button);
    }

    public function render():string
    {
        echo "<form 
            method='{$this->getMethod()}' 
            action='{$this->getAction()}'>" .
            implode(' ', $this->getItems()) .
            implode(' ', $this->getButtons()) .
            '</form>';
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param string $item
     */
    public function setItems(string $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return array
     */
    public function getButtons(): array
    {
        return $this->buttons;
    }

    /**
     * @param string $button
     */
    public function setButtons(string $button): void
    {
        $this->buttons[] = $button;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

}

$formItems = [

];
?>

    <h1>Surfresort-Buchung</h1>
    <?php

    $form = new Form('post');
    $form->addInputField('Vorname','firstname','text',[
            'required' => 'required'
    ]);
    $form->addInputField('Nachname','firstname','text');
    $form->addInputField('Passwort','password','password');
    $form->addInputField('Straße und Hausnummer','address','text');
    $form->addInputField('Postleitzahl','plz','text');
    $form->addInputField('Ort','city','text');
    $form->addInputField('Anreise','arrival','date');
    $form->addInputField('Abreise','departure','date');
    $form->addButton('Absenden','submit','submit');
    $form->render();

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