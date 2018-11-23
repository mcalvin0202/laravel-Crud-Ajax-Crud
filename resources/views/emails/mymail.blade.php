<h1>Hello {{$user['name']}}</h1>
<p>Please Click the link below for verify your email {{$user['email']}}</p>

<a href="{{ url('/verification', $user->verification->token) }}">Verify Email</a>

