<div class="container">
    <div class="page-header">
        <h1>This is User List Page</h1>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Surname</th>
            <th>Lastname</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $key => $user) { ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['lastname'] ?></td>
                <td>
                    <?php if ($user['is_friend']) { ?>
                        <p>Friend Added</p>
                    <?php } else { ?>
                        <button class="btn btn-primary"
                                onclick="window.location.href='<?= $links['AddFriend'].'/'.$user['id'] ?>';">
                            Add Friend
                        </button>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
