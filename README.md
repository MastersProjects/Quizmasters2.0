# Quizmasters 2.0 ![data](https://img.shields.io/badge/Status-development-orange.svg)
The new Quizmasters

## Inhalt

### - [](#)

## Beschreibung
In dem Modul 151, welches an der Technischen Berufsschule in Zürich, nachfolgend TBZ genannt, unterrichtet wird, war die Aufgabe eine Web Anwendung zu programmieren, welche mit einer Datenbank zusammen arbeitet. Die Web Applikation wird mit PHP, JavaScript, HTML/CSS3 und MSSQL realisiert.

## Proujektorganisation
In diesem Kapitel sind die Zuständigkeiten im Projekt definiert. 

### Zuständigkeitsgebiet der Mitarbeiter

#### Projekleitung
Für die Projektleitung sind alle Teammitglieder zuständig. Die Personen sind dafür verantwortlich, dass die Zeitplanung (GANTT-Diagramm) eingehalten wird, die Aufgaben den einzelnen Personen zugeteilt werden, und am Ende des Projektes ein lauffähiges Programm implementiert wurde.

##### Elia Perenzin
Elia Perenzin wird für die Datenbankentwicklung und für das Programmieren in PHP eingesetzt. Er wird auch für das Design, vor allem im Bereich JavaScript, zuständig sein.

##### Chiramet Phong Penglerd
Phong wird in der Entwicklung im Bereich PHP und der Datenbankentwicklung eingesetzt.

##### Luca Marti
Luca Marti ist für das Design der Web Applikation zuständig. Er wird bei der PHP Entwicklung die anderen Teammitglieder unterstützen. Zudem ist er verantwortlich für die Dokumentation.

##### Berater
Der Berater in diesem Projekt der Lehrer des Moduls 151. Er wird uns bei anfälligen Fragen oder Unklarheiten zur Seite stehen. Zudem wird die Person während des Unterrichtes immer wieder Inputs über verschiedene Themenhalten.

## Risikomanagement

### SZENARIO 1 – WEB SERVER IST NICHT MEHR ERREICHBAR
Wenn der Webserver mit unseren gehosteten Dateien nicht mehr verfügbar ist, dann ist das sehr kritisch
für unsere Applikation, da dann unsere Webseite nicht mehr aufrufbar ist

### SZENARIO 2 – EIN BENUTZER KANN EIN QUIZ AUSWERTEN OHNE SICH EINGELOGGT ZU SEIN
Wenn dieses Szenario eintrifft, dann ist dies für uns ein hohes Risiko, da man nur wenn man registriert
und angemeldet ist, die Quiz auswerten. Dies ist eine Funktion, welche wird nur den registrierten
Mitgliedern zur Verfügung stellen und diese sollte von aussen her nicht aufrufbar sein. 

### SZENARIO 3 – QUIZ WIRD OHNE FRAGEN GESTARTET
Ein User will ein Quiz lösen und die Fragen werden nicht dargestellt. Dies ist nicht gut, da man so keine
Punkte für das Quiz erhält. Es ist aber nicht so kritisch, da man die Seite neu laden kann oder ein anderes
Quiz auswählen und es sollten andere Fragen dargestellt werden.

### SZENARIO 4 – ES WERDEN NICHT ALLE USERDATEN GELÖSCHT, WENN DER USER SEINEN BENUTZER LÖSCHT
Es sollten alle Benutzerdaten gelöscht werden, wenn der Benutzer auf löschen drückt. Es ist nicht tragisch,
wenn nicht alle Daten gelöscht werden, da die Daten nicht an Dritte weitergegeben werden. 

# Sitemap
## FILES
### Index.php
Begrüssungs-Text mit Erklärung der Webseite. Es werden zwei zufällige Quiz mit deren Beschreibung auf
der Startseite angezeigt. Man kann sich auf dieser Seite einloggen und registrieren. Wenn man sich
registriert und alle Eingaben korrekt sind, dann wird man automatisch eingeloggt und man kann mehr
Funktionen nutzen als ein „nicht eingeloggter“ Benutzer.
### Quiz.php
Hier werden die Fragen von dem in der Navigation ausgewählten Quiz dargestellt. Diese Fragen sind
zufällig, das heisst, es kommen immer neue Fragen und nicht immer die gleichen. Es ist immer nur eine
Antwort pro Frage richtig und man kann nicht mehr als eine Antwort pro Frage auswählen.
### Result.php
Wenn man alle Fragen beantwortet hat, und auf den Auswerten Button auf der Seite Quiz.php drückt,
wird man auf folgende Seite weiter geleitet. Auf dieser Seite werden alle Fragen ausgewertet und die
Lösungen werden angezeigt.
### Profile.php
Auf der Seite Profile.php wird das ganze Profil des Benutzers angezeigt. Man kann seinen Benutzername,
Vorname, Nachname und die E-Mail Adresse kann geändert werden. Zudem kann man auf dieser Seite
sein Passwort ändern und den ganzen Account löschen.
## FOLDER
### Database
Alle Kalssen die benötigt warden um mit der Datenbank zu komunizieren. Das heisst Controller und für
jede Tabelle eine eigene Klasse, so bleibt das ganze überschaubar.
### Img
Hier warden alle Bilder gespeichert.
### Includes
Hier liegen alle Files die included werden, zum Beispiel der Header oder Google Analytics.
### Js
Alle Javascript Files.
### Model
Alle Model Klassen für die Webseite. Zum Beispiel User, Quiz, Frage, Antort, ...
### Resources
HTML includes wie zum Beispiel Navigation, Footer, …
### Style
Alle Style Files, in unserem Fall nur das cutsom.css File von Bootstrap. 

# Datenbank
|      **DBMS**                                 |Microsoft SQL Server 2012 |
| ------------------------------------- | :-----: |
| **DBMS** | Microsoft SQL Server 2012 |
| **Name** | QUIZMASTERS |
| **Anzahl Tabellen** | 8 |
| **Version** | 1.5 |
