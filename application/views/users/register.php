<div class="container">
    <div class="page-header">
        <h1><?= $pageHeader; ?></h1>
    </div>
    <form action="<?= base_url($links['Register']); ?>" method="POST" class="form-horizontal" autocomplete="off">
        <?php if (isset($errors['registering'])) { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong> <?= $errors['registering']; ?>
        </div>
        <?php } ?>
        <div class="form-group">
            <label class="col-sm-10"><h4>Account information</h4></label>
        </div>
        <div class="form-group <?= (isset($errors['username'])) ? 'has-error':''; ?>">
            <label class="col-sm-2 control-label" for="username">Username</label>
            <div class="col-sm-10">
                <input type="text"
                       class="form-control"
                       name="username"
                       id="username"
                       value="<?= set_value('username'); ?>"
                       placeholder="Username"/>
                <?= form_error('username', '<span class="help-block">', '</span>'); ?>
            </div>
        </div>
        <div class="form-group <?= (isset($errors['password'])) ? 'has-error':'' ?>">
            <label class="col-sm-2 control-label" for="password">Password</label>
            <div class="col-sm-10">
                <input type="password"
                       class="form-control"
                       name="password"
                       id="password"
                       value="<?= set_value('password'); ?>"
                       placeholder="Password"/>
                <?= form_error('password','<span class="help-block">', '</span>'); ?>
            </div>
        </div>
        <div class="form-group <?= (isset($errors['passconf'])) ? 'has-error':'' ?>">
            <label class="col-sm-2 control-label" for="password2">Re-Type Password</label>
            <div class="col-sm-10">
                <input type="password"
                       class="form-control"
                       name="passconf"
                       id="passconf"
                       value="<?= set_value('passconf'); ?>"
                       placeholder="Password"/>
                <?= form_error('passconf','<span class="help-block">', '</span>'); ?>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="col-sm-10"><h4>Personal detail</h4></label>
        </div>
        <div class="form-group <?= (isset($errors['name'])) ? 'has-error':'' ?>">
            <label class="col-sm-2 control-label" for="name">Name</label>
            <div class="col-sm-10">
                <input type="text"
                       class="form-control"
                       name="name"
                       id="name"
                       value="<?= set_value('name'); ?>"
                       placeholder="Surname"/>
                <?= form_error('name','<span class="help-block">', '</span>'); ?>
            </div>
        </div>
        <div class="form-group <?= (isset($errors['lastname'])) ? 'has-error':'' ?>">
            <label for="lastname" class="col-sm-2 control-label">Lastname</label>
            <div class="col-sm-10">
                <input type="text"
                       class="form-control"
                       name="lastname"
                       id="lastname"
                       value="<?= set_value('lastname'); ?>"
                       placeholder="Lastname"/>
                <?= form_error('lastname','<span class="help-block">', '</span>'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                <a href="<?= base_url($links['Login']); ?>">Cancel</a>
            </div>
        </div>
    </form>
</div>