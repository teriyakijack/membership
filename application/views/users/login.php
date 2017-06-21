<div class="container">
    <div class="login-container">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                <form method="POST" action="<?= base_url($links['Login']) ?>">
                    <?php if (isset($errors['login_fail'])) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?= $errors['login_fail']; ?>
                        </div>
                    <?php } ?>
                    <div class="form-group <?= (isset($errors['username'])) ? 'has-error':'' ?>">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder=""/>
                        <?= form_error('username', '<span class="help-block">', '</span>'); ?>
                    </div>
                    <div class="form-group <?= (isset($errors['password'])) ? 'has-error':'' ?>">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder=""/>
                        <?= form_error('password', '<span class="help-block">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <a href="<?= base_url($links['Register']) ?>">Register</a>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit" value="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
