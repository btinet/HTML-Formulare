# HTML-Formulare

1. [Einführung](#einleitung)
2. [Form-tag](#form-tag)
   1. [Attribute](#form-attribute)
3. [Input-tag](#input-tag)
   1. [Attribute](#input-attribute)
   2. [Labels](#labels)
      1. [Verschachteltes Label-Input-Gefüge](#verschachteltes-label-input-gefge)
      2. [Zuordnung durch IDs](#zuordnung-durch-ids)
4. [Aufgabe aus dem Unterricht](form2.php)

## Einleitung
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

## Input Tag
Inputfelder sind für freie Benutzereingaben geeignet wie zum Beispiel Namen, Adressen oder ähnliche Angaben.
````html
<input name="vorname">
````

### Input Attribute
| Attribut | Wert | Funktion |
|---|---|---|
|id|eindeutiger Name|Eindeutige Bezeichnung des Tags oder als Identifier für Javascript|
|class|css-Klassenname(n)|Formgebende Funktion oder als Identifier für Javascript|

### Labels
Alle Formularfelder benötigen einen Label (Bezeichnung), um den HTML-Standard zu erfüllen.
Labels können auf zwei verschiedene Weisen zugeordnet werden.

#### Verschachteltes Label-Input-Gefüge
Das Input tag muss innerhalb des entsprechenden Label tags stehen.
````html
<label>
    Vorname
    <input name="vorname">
</label>
````

#### Zuordnung durch IDs
Das Label tag kann an einer beliebigen Stelle auf der HTML-Seite stehen. Die Zuordnung
findet durch ``for="name der ID"`` und ``id="name der ID"`` statt.
````html
<label for="vorname">Vorname</label>
<input id="vorname" name="vorname">
````
