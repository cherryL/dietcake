<h1>Login</h1>
<form class="well" method="post" action="">
    <label>Your Username</label> <input type="text" class="span2" name="username">
    <label>Your Password</label> <input type="password" class="span2" name="password">
    <br>
    <button type="submit" class="btn btn-primary">Login</button>
    <a href="<?php eh(url('registration/createAccount')) ?>" class="btn btn-primary">Register</a>
</form>