<link rel="stylesheet" href="{{ asset('css/login.css')}}">
<div class="login">
	<h1>Login</h1>
    <p style="color: red; text-align:center;">{{ $message ?? '' }}</p>
    <form method="post">
      @csrf
    	<input type="text" name="email" placeholder="Email" required="required" />
      <input type="password" name="password" placeholder="Password" required="required" />
      <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>
</div>