<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Vendedor</title>
</head>
<body>
<h1>Painel Vendedor</h1>
    <div>{{ Auth::user()->name }}</div>
        <x-dropdown-link :href="route('profile.edit')">
            {{ __('Profile') }}
        </x-dropdown-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                             onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
</body>
</html>
