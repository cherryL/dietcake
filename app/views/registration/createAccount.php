<h1>Create Account</h1>

<?php if(isset($message['error'])): ?>
    <div class="alert alert-block">
        <h4 class="alert-heading">Validation error!</h4>
            <div><em><?php eh($message['error']) ?></em>
            </div>
    </div>
<?php endif ?>

<hr>

<form class="well" method="post" action="<?php eh(url('registration/createAccount')) ?>">
    <label>First name</label> <input type="text" class="span2" name="firstname">
    <label>Last name</label> <input type="text" class="span2" name="lastname">
    <label>Username</label> <input type="text" class="span2" name="username">
    <label>Password</label> <input type="password" class="span2" name="password">
    <br>
    <input type="submit" class="btn btn-primary" name="createAccount" value="Create">
</form>