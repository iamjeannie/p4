<style>
table, th, td {
    border:1px solid #444
}
</style>
<table>
    <thead>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user->id ?></td>
                <td><?php echo $user->username ?></td>
                <td><?php echo $user->email ?></td>
                <td>
                    <a href="users/record/<?php echo $user->id ?>">Edit</a>
                    <form action="users/record"method="post">
                        <input type="hidden" name="_method"value="DELETE">
                        <input type="hidden" name="user_id"value="<?php echo $user->id?>">
                        <input type="submit"value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="users/create">Add New User</a>
