<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>As_member List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Member Fullname</th>
		<th>Member Email</th>
		<th>Member Username</th>
		<th>Member Password</th>
		<th>Member Photo</th>
		<th>Member Province</th>
		<th>Member City</th>
		<th>Member Chellphone</th>
		<th>Memner Address</th>
		<th>Member Status</th>
		<th>Member Level</th>
		<th>Member Blokir</th>
		
            </tr><?php
            foreach ($as_member_data as $as_member)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $as_member->member_fullname ?></td>
		      <td><?php echo $as_member->member_email ?></td>
		      <td><?php echo $as_member->member_username ?></td>
		      <td><?php echo $as_member->member_password ?></td>
		      <td><?php echo $as_member->member_photo ?></td>
		      <td><?php echo $as_member->member_province ?></td>
		      <td><?php echo $as_member->member_city ?></td>
		      <td><?php echo $as_member->member_chellphone ?></td>
		      <td><?php echo $as_member->memner_address ?></td>
		      <td><?php echo $as_member->member_status ?></td>
		      <td><?php echo $as_member->member_level ?></td>
		      <td><?php echo $as_member->member_blokir ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>