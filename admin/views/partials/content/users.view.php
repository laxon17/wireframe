<table class="highlight striped centered responsive-table">
    <thead>
        <tr>
            <td class="center">UserId</td>
            <td class="center"></td>
            <td class="center">Username</td>
            <td class="center">Joined</td>
            <td class="center">Role</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user) : ?>
            <tr>
                <td><?= $user->UserId ?></td>
                <td><img class="user-profile" src="/public/img/users/<?= $user->ProfilePicture ?>" alt="User"></td>
                <td><?= $user->Username ?></td>
                <td><?= $user->CreatedAt ?></td>
                <td>
                    <select name="role" class="role-change">
                        <?php foreach($roles as $role) : ?>
                            <option value="<?= $role->RoleId ?>" <?= $role->RoleId === $user->RoleId ? 'selected' : '' ?>><?= $role->RoleName ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>