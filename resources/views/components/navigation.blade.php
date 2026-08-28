<nav>
    <ul class="main-nav">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : 'ne' }}">Startseite</a></li>
        <li>
            <a>Kurse</a>
            <ul class="submenu">
                <li><a href="{{ route('courses.index') }}" class="{{ request()->routeIs('courses.index') ? 'active' : '' }}">Übersicht</a></li>
                <li><a href="{{ route('courses.create') }}" class="{{ request()->routeIs('courses.create') ? 'active' : '' }}">Neuer Kurs</a></li>
                <li><a href="{{ route('courses.join') }}" class="{{ request()->routeIs('courses.join') ? 'active' : '' }}">Am Kurs teilnehmen</a></li>
            </ul>
        </li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontakt</a></li>
    </ul>
</nav>
