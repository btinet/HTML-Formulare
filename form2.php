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
    protected array $attributes;

    public function __construct($method = 'get', array $attributes = [], $action = false)
    {
        $this->setMethod($method);
        $this->setAction($action);
        $this->setAttributes($attributes);
    }

    public function addInput($label, $name,$type,array $attributes = []): Form
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
        return $this;
    }

    public function addButton($label, $name, $type,array $attributes = []):Form
    {
        $button = "<button type='{$type}' name='{$name}'";
        if($attributes) {
            foreach ($attributes as $attribute => $value) {
                $button .= " {$attribute}='{$value}' ";
            };
        }
        $button .= ">{$label}</button>";
        $this->setButtons($button);
        return $this;
    }

    public function render():string
    {
        $form = "<form 
            method='{$this->getMethod()}' 
            action='{$this->getAction()}'";
        foreach($this->getAttributes() as $attribute => $value)
        {
            $form .= " {$attribute}='{$value}' ";
        }
        $form .=" >" .
            implode(' ', $this->getItems()) .
            implode(' ', $this->getButtons()) .
            '</form>';
        return $form;
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
    public function setItems(string $item):void
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

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttributes(array $attributes): Form
    {
        $this->attributes = $attributes;
        return $this;
    }

}

?>

    <h1>Surfresort-Buchung</h1>
    <?php

    $form = new Form('post');

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