<div class="container">
    <div class="page-header">
        <h1>This is Friend List Page</h1>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Surname</th>
            <th>Lastname</th>
            <th>Balance</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($friends as $key => $friend) { ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $friend['username'] ?></td>
                <td><?= $friend['name'] ?></td>
                <td><?= $friend['lastname'] ?></td>
                <td><?= fmtCurrency($friend['balance_amount'], 'THB'); ?></td>
                <td>
                    <button class="btn btn-default"
                            onclick="window.location.href='<?= base_url($links['DetailFriend'].'/'.$friend['id']); ?>';">
                        Detail
                    </button>
                    <button class="btn btn-danger"
                            onclick="window.location.href='<?= base_url($links['RemoveFriend'].'/'.$friend['id']); ?>';">
                        Remove Friend
                    </button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
