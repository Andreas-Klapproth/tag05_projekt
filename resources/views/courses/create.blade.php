<x-layouts.app title="Neuer Kurs">
    <h1>Neuen Kurs anlegen</h1>
    <pre>
        <form novalidate action="{{route('courses.store')}}" method="post">
            @csrf

            <label for="name">Name des Kurses</label>
            <input type="text" name="name" id="name" value="{{old('name')}}" required>
            <x-forms.error name="name"/>

            <label for="description">Name des Kurses</label>
            <textarea name="description" id="description">{{old('description')}}</textarea>
            <x-forms.error name="description"/>

            <label for="max_participants">Maximale Anzahl der Teilnehmer</label>
            <input type="number" name="max_participants" id="max_participants" value="{{ old('max_participants') }}"
                   required>
            <x-forms.error name="max_participants"/>

            <label for="date">Datum</label>
            <input type="date" name="date" id="Date" value="{{old('date',now()->format('Y-m-d'))}}" required>
            <x-forms.error name="date"/>

            <button type="submit">Abschicken</button>
        </form>



    </pre>
</x-layouts.app>

