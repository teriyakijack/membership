<div class="container">
    <div id="container">
        <h1>Welcome to Back!, <?= $AuthUser->getUsername(); ?></h1>

        <div id="body">
            Hola <?= $AuthUser->getName(); ?> <?= $AuthUser->getLastname(); ?>
            <br>
            Your current balance is <?= fmtCurrency($userBalance, 'THB'); ?>
        </div>

        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    </div>
</div>