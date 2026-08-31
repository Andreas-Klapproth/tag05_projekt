<x-layouts.app title="Kursdetails">

    <h1>Kursdetails</h1>
    <p>Id: {{ $course->id }}</p>
    <p>Name: {{ $course->name }}</p>
    <p>Datum: {{ $course->date->format('d.M.Y') }}</p>
    <p>Max. Teilnehmer: {{ $course->max_participants }}</p>
    <p>Erstellt am: {{ $course->created_at }}</p>

</x-layouts.app>
