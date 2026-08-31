@props(['for' => '__REQUIRED__'])

@error($name)
    <p class="error"> {{ $message }}</p>
@enderror
