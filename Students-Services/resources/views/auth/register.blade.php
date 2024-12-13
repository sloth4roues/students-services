<form action="/register" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nom" value="{{ old('name') }}" required>
    @error('name')
        <div>{{ $message }}</div>
    @enderror

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
    @error('email')
        <div>{{ $message }}</div>
    @enderror

    <input type="password" name="password" placeholder="Mot de passe" required>
    @error('password')
        <div>{{ $message }}</div>
    @enderror

    <input type="password" name="password_confirmation" placeholder="Confirmez le mot de passe" required>

    <button type="submit">S'inscrire</button>
</form>

