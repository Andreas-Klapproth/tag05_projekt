@props(['for' => '__REQUIRED__'])

@error($for)
    <p class="error"> {{ $message }}</p>
@enderror
