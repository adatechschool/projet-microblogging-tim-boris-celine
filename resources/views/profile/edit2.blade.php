<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    
    <h1>Modifier le profil</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <!-- Ajoutez d'autres champs si nécessaire -->
        <button type="submit">Mettre à jour</button>
    </form>
</x-app-layout>
