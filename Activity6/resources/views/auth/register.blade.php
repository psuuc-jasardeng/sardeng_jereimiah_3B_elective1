<form action="{{ route('register') }}" method="post">
@csrf

<div>
    <label for="name">Name: </label>
    <input type="text" name="name" value="{{ old("name") }}" required autofocus>
</div>

<div>
    <label for="email">Email: </label>
    <input type="email" name="email" value="{{ old("email") }}" required>
</div>

<div>
    <label for="password">Password: </label>
    <input type="password" name="password" required>
</div>


<div>
    <label for="password_confirmation">Confirm Password: </label>
    <input type="password_confirmation" name="password_confirmation" required >

</div>
<div>
    <button type="submit">Register</button>
</div>
</form>