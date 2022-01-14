<?php

class FormType
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

    public function addInput($label, $name,$type,array $attributes = []): FormType
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

    public function addButton($label, $name, $type,array $attributes = []):FormType
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

    public function setAttributes(array $attributes): FormType
    {
        $this->attributes = $attributes;
        return $this;
    }

}
