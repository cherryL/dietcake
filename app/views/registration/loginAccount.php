<h1>Login</h1>

<?php if(isset($message['error'])): ?>
    <div class="alert alert-block">
        <h4 class="alert-heading">Validation error!</h4>
        <div><em><?php eh($message['error']) ?></em>
        </div>
    </div>
<?php endif ?>

<form class="well" method="post" action="<?php eh(url('registration/loginAccount')) ?>">
    <label>Your Username</label> <input type="text" class="span2" name="username">
    <label>Your Password</label> <input type="password" class="span2" name="password">
    <br>
    <input type="submit" class="btn btn-primary" name="login" value="Login">
    <a href="<?php eh(url('registration/createAccount')) ?>" class="btn btn-primary">Register</a>
</form>