<?php
view('admin.layouts.header', ['title'=>trans('admin.users')]);

$users = db_paginate("users", "", 12);
?>
 
	<div
		class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2> <?php echo  trans('admin.users') ; ?></h2>
		<a class="btn btn-primary" href="<?php echo  aurl('users/create') ; ?>"><i class="fa-solid fa-plus"></i> <?php echo  trans('admin.create') ; ?></a>
	</div>
	<div class="table-responsive small">
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col"><?php echo  trans('user.name') ; ?></th>
					<th scope="col"><?php echo  trans('user.email') ; ?></th>
					<th scope="col"><?php echo  trans('user.mobile') ; ?></th>
					<th scope="col"><?php echo  trans('user.user_type') ; ?></th>
					<th scope="col"><?php echo  trans('admin.action') ; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php while($user = mysqli_fetch_assoc($users['query'])): ?>
				<tr>
					<td><?php echo  $user['id'] ; ?></td>
					<td><?php echo  $user['name'] ; ?></td>
					<td><?php echo  $user['email'] ; ?></td>
					<td><?php echo  $user['mobile'] ; ?></td>
					<td><?php echo  trans('user.'.$user['user_type']) ; ?></td>
					<td>
						<a href="<?php echo  aurl('users/show?id='.$user['id']) ; ?>"><i
								class="fa-regular fa-eye"></i></a>
						<a href="<?php echo  aurl('users/edit?id='.$user['id']) ; ?>"><i
								class="fa-solid fa-pen-to-square"></i></a>
           			  <?php echo  delete_record(aurl('users/delete?id='.$user['id'])) ; ?>   
					</td>
				</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
	<?php echo  $users['render'] ; ?>
 
<?php
view('admin.layouts.footer');
?>