<form action="{{ route('login') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nom" value="{{ old('name') }}" required>
    @error('name')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <input type="password" name="password" placeholder="Mot de passe" required>
    @error('password')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <button type="submit">Se connecter</button>

    <!-- Affichage d'une alerte globale si le login échoue -->
    @if (session('error'))
        <div style="color: red; margin-top: 10px;">{{ session('error') }}</div>
    @endif
</form>
