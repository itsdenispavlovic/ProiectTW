<h2>Quick links</h2>
<ul class="nav nav-pills nav-stacked">
    <li class="<?php echo (@$active==1) ? 'active' : ''; ?>"><a href="profile">Profile</a></li>
    <?php
    if(isset($_GET['username']))
    {
        if($user->getUID($_GET['username']) != $_SESSION['user'])
        {
            // Do not display
        }
        else
        {
            // Display
            ?>  
            <li class="<?php echo (@$active==2) ? 'active' : ''; ?>"><a href="accountSettings">Account Settings</a></li>
            <?php
        }
    }
    else
    {
        ?>
        <li class="<?php echo (@$active==2) ? 'active' : ''; ?>"><a href="accountSettings">Account Settings</a></li>
        <?php
    }
    ?>
    
</ul>