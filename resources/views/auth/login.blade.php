<form action="/login" method="post">
    @csrf

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <button type="reset">Reset</button>
        <button type="submit">Login</button>
    </div>
</form>