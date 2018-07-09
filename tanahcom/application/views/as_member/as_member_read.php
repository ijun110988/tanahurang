<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">As_member Read</h2>
        <table class="table">
	    <tr><td>Member Fullname</td><td><?php echo $member_fullname; ?></td></tr>
	    <tr><td>Member Email</td><td><?php echo $member_email; ?></td></tr>
	    <tr><td>Member Username</td><td><?php echo $member_username; ?></td></tr>
	    <tr><td>Member Password</td><td><?php echo $member_password; ?></td></tr>
	    <tr><td>Member Photo</td><td><?php echo $member_photo; ?></td></tr>
	    <tr><td>Member Province</td><td><?php echo $member_province; ?></td></tr>
	    <tr><td>Member City</td><td><?php echo $member_city; ?></td></tr>
	    <tr><td>Member Chellphone</td><td><?php echo $member_chellphone; ?></td></tr>
	    <tr><td>Memner Address</td><td><?php echo $memner_address; ?></td></tr>
	    <tr><td>Member Status</td><td><?php echo $member_status; ?></td></tr>
	    <tr><td>Member Level</td><td><?php echo $member_level; ?></td></tr>
	    <tr><td>Member Blokir</td><td><?php echo $member_blokir; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('as_member') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>