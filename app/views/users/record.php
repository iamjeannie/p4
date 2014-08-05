<form action="" method="post">
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="user_id" value="<?php echo$user->id ?>">
    Username:<br>
    <input name="username" value="<?php echo $user->username ?>"><br>
    Email<br>
    <input name="email" value="<?php echo $user->email?>"><br>
    <input type="submit">
</form>
