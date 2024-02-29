<?php
view('admin.layouts.header', ['title'=>trans('admin.users').'-'.trans('admin.edit')]);


$user = db_find('users', request('id'));

redirect_if(empty($user), aurl('users'));

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div
		class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2> <?php echo  trans('admin.users') ; ?> - <?php echo  trans('admin.edit') ; ?></h2>
		<a class="btn btn-info" href="<?php echo  aurl('users') ; ?>"><?php echo  trans('admin.users') ; ?></a>
	</div>

	<?php if(any_errors()): ?>
	<div class="alert alert-danger">
		<ol>
			<?php foreach(all_errors() as $error): ?>
			<li><?php echo $error ?></li>
			<?php endforeach; ?>
		</ol>
	</div>
	<?php endif; ?>

	
	<?php 
	$name = get_error('name');
	$email = get_error('email');
	$mobile = get_error('mobile');
	$user_type = get_error('user_type');
	end_errors();

	 ?>

	<form method="post" action="<?php echo aurl('users/edit?id='.$user['id'] ); ?>" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="post" />
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="name"><?php echo trans('user.name'); ?></label>
					<input type="text" name="name" placeholder="<?php echo trans('user.name'); ?>"
						class="form-control <?php echo  !empty($name)?'is-invalid':'' ; ?>" value="<?php echo  $user['name'] ; ?>" />
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="email"><?php echo trans('user.email'); ?></label>
					<input type="text" name="email" placeholder="<?php echo trans('user.email'); ?>"
						class="form-control <?php echo  !empty($email)?'is-invalid':'' ; ?>" value="<?php echo  $user['email'] ; ?>" />
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="password"><?php echo trans('user.password'); ?></label>
					<input type="password" name="password" placeholder="<?php echo trans('user.password'); ?>"
						class="form-control <?php echo  !empty($password)?'is-invalid':'' ; ?>"  />
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="mobile"><?php echo trans('user.mobile'); ?></label>
					<input type="text" name="mobile" placeholder="<?php echo trans('user.mobile'); ?>"
						class="form-control <?php echo  !empty($mobile)?'is-invalid':'' ; ?>" value="<?php echo  $user['mobile'] ; ?>" />
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="user_type"><?php echo trans('user.user_type'); ?></label>
          <select class="form-select <?php echo  !empty($user_type)?'is-invalid':'' ; ?>" name="user_type">
            <option value="user" <?php echo  $user['user_type'] == 'user'?'select':'' ; ?>><?php echo trans('user.user'); ?></option>
            <option value="admin" <?php echo  $user['user_type'] == 'admin'?'select':'' ; ?>><?php echo trans('user.admin'); ?></option>
          </select>
	 
				</div>
			</div>
		 
 
		</div>
		<input type="submit" class="btn btn-success" value="<?php echo trans('admin.save'); ?>" />
	</form>
</main>
<?php
view('admin.layouts.footer');
?>