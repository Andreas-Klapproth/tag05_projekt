<x-layouts.app title="Kurse">
    <h1>Übersicht aller Kurse</h1>

    <table>
        @forelse($courses as $course)
            <tr>
                <td>{{$course->name}}</td>
                <td>{{$course->description}}</td>
                <td>{{$course->date->format('d.m.Y')}}</td>
                <td>
                    <button>Edit</button>
                </td>
                <td>
                    <button>Delete</button>
                </td>
            </tr>
        @empty
            Aktuell keine Kurse vorhanden!
        @endforelse
    </table>
</x-layouts.app>
