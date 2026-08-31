<x-layouts.app title="Kurs erstellt">

    <h1>Kurs erstellt</h1>
    <p>Name: {{ $course->name }}</p>
    <p>Datum: {{ $course->date->format('d.M.Y') }}</p>
    <p>Max. Teilnehmer: {{ $course->max_participants }}</p>
    <p>Erstellt am: {{ $course->created_at }}</p>

</x-layouts.app>
