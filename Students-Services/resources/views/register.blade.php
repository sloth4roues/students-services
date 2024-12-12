<form action="/register" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="password" name="password_confirmation" placeholder="Confirmez le mot de passe" required>
    <!-- <input type="number" name="points" value="0" readonly> -->
    <!-- <input type="date" name="registration_date" value="{{ date('Y-m-d') }}" readonly> -->
    <button type="submit">S'inscrire</button>
</form>
