<h1>Register User</h1>
<p>{{ $message ?? ' '}}</p>
<form action="" method="POST">
  @csrf
  <input type="text" placeholder="name" name="name"><br>
  <input type="text" placeholder="email" name="email"><br>
  <input type="password" placeholder="password" name="password"><br>
  <input type="password" placeholder="confirm password" name="confirm_pw"><br>
  <input type="submit" value="Submit"><br>
</form>
<p><a href={{route('home')}}>Back to Home Page</a></p>