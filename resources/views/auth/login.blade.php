<form method="POST" action="/login">
    @csrf

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="password" name="password" placeholder="Password" required>
    <br><br>

    <button type="submit">Login</button>
</form>

@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif