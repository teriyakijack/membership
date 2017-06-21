<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <?php if (isset($tabLinks)) {
                foreach ($tabLinks as $name => $lnk) { ?>
                    <a class="navbar-brand" href="<?= base_url($lnk); ?>"><?= $name; ?></a>
                <?php }
            }?>
        </div>
        <p class="navbar-text navbar-right"><strong><?= $AuthUser->getUsername(); ?></strong>, <a href="<?= base_url($links['Logout']); ?>" class="navbar-link">Logout</a></p>
    </div>
</nav>