<?php 
	include 'inc/header.php'; 
    include 'lib/User.php';

	Session::checkSession();
	$user = new User();
?>

<?php
    $loginmsg = Session::get("loginmsg");
	if (isset($loginmsg)) {
		echo $loginmsg;
    }
	Session::set("loginmsg", NULL);
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>User List 
			<span class="pull-right">Welcome
                <strong>

                    <?php   $name = Session::get("username");
                    
                        if (isset($name)) {
                            echo $name;
                        }
                        
                    ?>

                </strong>
			</span>
		</h2>
	</div> <!-- End panel-heading -->
	<div class="panel-body">

		<table class="table table-striped">
            <thead>
                <th width="20%"> Serial </th>
                <th width="20%"> Name </th>
                <th width="20%"> Username </th>
                <th width="20%"> Email Address </th>
                <th width="20%"> Action </th>
            </thead>
            
            <tbody>
            <?php
                $user = new User();
                $userdata = $user->getUserData();

                if ($userdata) {
                    $i = 0;

                    foreach ($userdata as $sdata) : ?>
                        <?php $i++; ?>
                        <tr>
                            <td><?php  echo $i; ?></td>
                            <td><?php echo $sdata['name'] ?></td>
                            <td><?php echo $sdata['username'] ?></td>
                            <td><?php echo $sdata['email'] ?></td>
                            <td><a class="btn btn-primary" href="profile.php?id=<?php echo $sdata['id']; ?>">View </a></td>
                        </tr>
                    <?php endforeach ?>

				<?php } else { ?>

                    <tr>
                        <td colspan="5"><h2> No user Data Found </h2></td>
                    </tr>

                <?php } ?>
            </tbody>
		</table>
	</div> <!-- End panel-body -->
</div> <!-- End panel-default -->

<?php include 'inc/footer.php'; ?>
