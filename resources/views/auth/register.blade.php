<form action="/register" method="post">
    @csrf

    <div>
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" required>
    </div>
    <div>
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="password_confirmation" required>
    </div>
    <div>
        <button type="reset">Reset</button>
        <button type="submit">Register</button>
    </div>
</form>

@if($errors->any())
<div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
