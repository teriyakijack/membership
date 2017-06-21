<div class="container">
    <div id="container">
        <h1><?= $friend['username']; ?>'s Detail</h1>

        <div id="body">
            First name: <?= $friend['name']; ?>
            <br>
            Last name: <?= $friend['lastname']; ?>
            <br>
            Current balance is <?= fmtCurrency($friend['balance_amount'], 'THB'); ?>
        </div>
        <p class="footer">Page rendered in <strong>{elapsed_time}</strong>
            seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
        </p>
    </div>
</div>