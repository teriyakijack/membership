<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form method="POST" action="<?= base_url($links['transaction']); ?>">
                <?php if (isset($errors['transaction'])) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> <?= $errors['transaction']; ?>
                    </div>
                <?php } ?>
                <div class="well well-lg">Your current Balance is <strong><?= $currentBalance ?></strong> Baht</div>
                <div class="form-group <?= (isset($errors['transaction_amount'])) ? 'has-error':''; ?>">
                    <label for="transaction_amount">Transaction amount</label>
                    <input type="text" class="form-control" name="transaction_amount" id="transaction_amount" placeholder="">
                    <?= form_error('transaction_amount', '<span class="help-block">', '</span>'); ?>
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="deposit">Deposit</button>
                <button type="submit" class="btn btn-danger" name="submit" value="withdraw">Withdraw</button>
            </form>
        </div>
    </div>
</div>