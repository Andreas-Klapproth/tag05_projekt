## 🌐 Routing & Endpunkte

Die Anwendung verwendet eine strukturierte Routen-Architektur mit Gruppen (`Route::controller`), um Redundanz zu vermeiden.

> **⚠️ Wichtiger Hinweis zur Reihenfolge:**  
> Statische Pfade (wie `/courses/create` oder `/courses/join`) sind **vor** dynamischen Pfaden mit Parametern (`/courses/{course}`) definiert. Dadurch wird verhindert, dass Wörter wie `create` oder `join` als `{course}`-ID interpretiert werden und einen 404-Fehler auslösen.

### 🛠️ Routen-Optimierung (`Route::group`)

Um den Code in `routes/web.php` sauber und wartbar (DRY – *Don't Repeat Yourself*) zu halten, werden alle Kurs-Routen über eine **Route Group** gebündelt:

```php
Route::controller(CourseController::class)->prefix('courses')->as('courses.')->group(function () {
    // Endpunkte...
});
```
### 🎯 Detaillierte Erklärung der `group()`-Methode

Die Methode `Route::group()` dient in Laravel als Container für zusammengehörige Endpunkte. Sie bietet zwei zentrale Vorteile:

1. **Vermeidung von Redundanz (DRY-Prinzip):**  
   Anstatt Attribute wie Controller, URL-Pfade oder Namensräume bei jeder einzelnen Route manuell zu wiederholen, werden sie **einmalig** auf Gruppenebene definiert und vererbt.

2. **Zentrale Wartbarkeit:**  
   Änderungen an der Routen-Architektur (z. B. eine Verschiebung von `/courses` zu `/kurse` oder das Anbinden einer Middleware wie Auth) müssen nur an einem einzigen Punkt in der `group()`-Definition angepasst werden, anstatt jede Route einzeln zu editieren.

```php
// Beispiel: Funktionsweise des Chaining vor der group()
Route::controller(CourseController::class) // 1. Welcher Controller?
    ->prefix('courses')                     // 2. Welches URL-Prefix?
    ->as('courses.')                        // 3. Welcher Name-Prefix?
    ->group(function () {                   // 4. Öffnet den Gültigkeitsbereich
        
        // Alle hier definierten Routen erben die Einstellungen 1, 2 und 3
        Route::get('/create', 'create')->name('create');
        // Ausgedrückt als Resultat: 
        // URL: /courses/create | Name: courses.create | Action: CourseController@create

    });
```

---

### 1. Statische Seiten (`PageController`)

| Methode | URL        | Route Name | Beschreibung |
|:--------|:-----------|:-----------|:-------------|
| `GET`   | `/`        | `home`     | Startseite   |
| `GET`   | `/contact` | `contact`  | Kontaktseite |

---

### 2. Kurse Feature (`CourseController`)

Alle Kurs-Routen nutzen das Prefix `/courses` und den Namensraum `courses.`.

#### Statische Kurs-Pfade (Ohne Parameter)
| Methode | URL               | Route Name       | Beschreibung                                 |
|:--------|:------------------|:-----------------|:---------------------------------------------|
| `GET`   | `/courses`        | `courses.index`  | Übersicht aller Kurse                        |
| `POST`  | `/courses`        | `courses.store`  | Neuen Kurs in der Datenbank speichern        |
| `GET`   | `/courses/create` | `courses.create` | Formular zur Kurserstellung anzeigen         |
| `GET`   | `/courses/join`   | `courses.join`   | Formular/Code-Eingabe zum Beitreten anzeigen |

#### Dynamische Kurs-Pfade (Mit `{course}` Parameter)
| Methode | URL                              | Route Name             | Beschreibung                                        |
|:--------|:---------------------------------|:-----------------------|:----------------------------------------------------|
| `GET`   | `/courses/{course}`              | `courses.show`         | Details eines spezifischen Kurses anzeigen          |
| `GET`   | `/courses/{course}/created`      | `courses.created`      | Bestätigungsseite nach erfolgreicher Kurserstellung |
| `GET`   | `/courses/{course}/confirm-join` | `courses.confirm-join` | Vorschau / Bestätigung vor dem Kursbeitritt         |
| `POST`  | `/courses/{course}/join`         | `courses.process-join` | Beitritt zu einem Kurs verarbeiten/speichern        |
| `GET`   | `/courses/{course}/joined`       | `courses.joined`       | Bestätigungsseite nach erfolgreichem Beitritt       |
