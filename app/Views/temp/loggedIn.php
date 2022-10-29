<div class="dropdown dropstart ms-2">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo $_SESSION["username"];?>
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item"><?php echo $_SESSION["name"]. " | ". $_SESSION["role"];?></a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item"href="<?php echo base_url();?>/dashboardAdmin">Dashboard Admin</a></li>
        <li><a class="dropdown-item" href="<?php echo base_url();?>/editProfile">Edit Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li class="logout"><a class="dropdown-item" href="/logout">Logout</a></li>
    </ul>
</div>
<?php echo '<img alt="profile" class="profile-pic"  src="data:image/png;base64,'.$_SESSION["avatar"].'"/>'; ?>