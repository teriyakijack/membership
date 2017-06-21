    <?php if (isset($javaScripts)) {
        foreach ($javaScripts as $js) { ?>
            <script type="text/javascript" src="<?= base_url($js) ?>"></script>
        <?php }
    } ?>
    </body>
</html>