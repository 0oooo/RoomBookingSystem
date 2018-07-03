<div class="nav-bar">
    <div class="menu">
        <?php
        $userType = get_session_variable('userType');
        if (check_if_signed_in()): ?>
            <a class="nav-item nav-item-right" href="sign-out.php?username=<?= get_session_variable('username')?>">Logout</a>
            <?php if ($userType == 'staff'): ?>
                <a class="nav-item nav-item-right" href="staff-delete.php">Delete Profile</a>
                <a class="nav-item nav-item-right" href="staff-edit.php">Edit Profile</a>
                <a class="nav-item" href="staff-home.php">Hello <?php echo get_session_variable('name') ?> </a>
            <?php else: ?>
                <a class="nav-item" href="admin-home.php">Admin interface </a>
            <?php endif; ?>
        <?php else: ?>
            <a class="nav-item nav-item-right login" href="sign-in.php">Login</a>
        <?php endif; ?>

    </div>
</div>
