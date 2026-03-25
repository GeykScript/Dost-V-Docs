<h2>Welcome {{ $user->first_name }}!</h2>

<p>Your account has been created.</p>

<p><strong>Username:</strong> {{ $user->username }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Password:</strong> {{ $generatedPassword }}</p>

<p>Please login and change your password immediately.</p>