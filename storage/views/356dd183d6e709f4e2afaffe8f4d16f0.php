<?php
view('admin.layouts.header', ['title'=>trans('admin.users').'-'.trans('admin.show')]);


$user = db_find('users', request('id'));

redirect_if(empty($user), aurl('users'));

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div
		class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2> <?php echo  trans('admin.users') ; ?> - <?php echo  trans('admin.show') ; ?> #<?php echo  $user['name'] ; ?></h2>
		<a class="btn btn-info" href="<?php echo  aurl('users') ; ?>"><?php echo  trans('admin.users') ; ?></a>
	</div>
 

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="name"><?php echo trans('user.name'); ?></label>
				<?php echo  $user['name'] ; ?>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="form-group">
				<label for="description"><?php echo trans('user.email'); ?></label>
				<?php echo  $user['email'] ; ?>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="description"><?php echo trans('user.mobile'); ?></label>
				<?php echo  $user['mobile'] ; ?>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="description"><?php echo trans('user.user_type'); ?></label>
				<?php echo  trans('user.'.$user['user_type']) ; ?>
			</div>
		</div>
	</div>

</main>
<?php
view('admin.layouts.footer');
?>