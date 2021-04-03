<?php
?>

<table id="table-users" class="table table-hover">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Is Banned?</th>
        </tr>
    </thead>
    <tbody>
    <? foreach($data as $user): ?>
        <tr onclick="getUser(<?= $user['id']?>)">
            <th scope="row"><?= $user['id']?></th>
            <td><?= $user['name']?></td>
            <td><?= $user['email']?></td>
            <td><?= $user['role']?></td>
            <td><?= $user['is_banned'] == 0 ? 'No' : 'Yes' ?></td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>

<script src="/js/users.js"></script>
<script src="/js/tabs.js"></script>
