<form method="post" class="form-signin" >
  <input type="hidden" name="csrf" value="<?php echo($csrf) ?>">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block signUpButton" type="submit" value="Login">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</form>