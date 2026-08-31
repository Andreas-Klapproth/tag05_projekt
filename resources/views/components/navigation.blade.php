<nav>
    <ul class="main-nav">
        <li>
            <x-nav-link route="home">Startseite</x-nav-link>
        </li>
        <li>
            <!-- activePattern =  courses.* damit auf alle Routen reagiert wird -->
            <x-nav-link route="courses.index" activePattern="courses.*">Kurse</x-nav-link>
            <ul class="submenu">
                <li>
                    <x-nav-link route="courses.index">Übersicht</x-nav-link>
                </li>
                <li>
                    <x-nav-link route="courses.create">Neuer Kurs</x-nav-link>
                </li>
                <li>
                    <x-nav-link route="courses.join">Am Kurs teilnehmen</x-nav-link>
                </li>
            </ul>
        </li>
        <li>
            <x-nav-link route="contact">Kontakt</x-nav-link>
        </li>
    </ul>
</nav>
