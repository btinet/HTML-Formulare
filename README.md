# HTML-Formulare

1. [Einführung](#einfhrung)
2. [Form-tag](#form-tag)
   1. [Attribute](#form-attribute)
3. [Aufgabe aus dem Unterricht](form2.php)

## Einführung
HTML-Formulare dienen der Erfassung von Benutzereingaben und Interaktionen.
Ein Formular ist wie folgt aufgebaut:

````html
<form method="get">
    <label>
        Eingabefeld:
        <input type="text" name="input_field">
    </label>
    <button type="submit">Absenden</button>
</form>
````

## Form Tag
Alle Elemente eines Formulars befinden sich innerhalb des ````<form></form>````-tags. Auch hier gibt es Ausnahmen,
aber dazu später mehr.

### Form Attribute
Folgende Attribute werden für das Formular benötigt:

| Attribut | Wert | Funktion |
|---|---|---|
|action|URL|Zielscript, dass die Formulardaten nach Absenden verarbeiten soll|
|method|get/post|Die Formulardaten werden entweder über GET oder POST übergeben|
|id|eindeutiger Name|Eindeutige Bezeichnung des Tags oder als Identifier für Javascript|
|class|css-Klassenname(n)|Formgebende Funktion oder als Identifier für Javascript|
|novalidate|novalidate|Browser wird angewiesen, Formular nicht zu überprüfen|

Beispiel:
````html
<form action="pfad/zum/script" method="get" id="exampleForm">
    <!-- Inhalt des Formulars /-->
</form>
````
