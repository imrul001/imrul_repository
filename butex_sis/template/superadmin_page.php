<script type="text/javascript">
    $(document).ready(function(){
        $('#super_tabs').tabs();
    })
</script>
<div id="content">
    <div id="super_tabs" style="width: 70%; margin: 0 auto;">
        <ul>
            <li><a href="#super_tabs-1">Change Password</a></li>
            <li><a href="#super_tabs-2">General User</a></li>
<!--            <li><a href="#super_tabs-3">Superadmin Profile</a></li>-->
        </ul>
        <div id="super_tabs-1">
            <?php include 'superadmin_change_password.php';?>
        </div>
        <div id="super_tabs-2">
            <?php include 'general_user.php'; ?>
        </div>
<!--        <div id="super_tabs-3"></div>-->
    </div>
</div>