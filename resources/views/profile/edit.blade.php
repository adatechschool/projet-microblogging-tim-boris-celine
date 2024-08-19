<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le profil</title>
</head>
<body>
    <h1>Modifier le profil</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <!-- Ajoutez d'autres champs si nécessaire -->
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>