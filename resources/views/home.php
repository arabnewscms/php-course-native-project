<?php
view('layout.header', ['title'=>trans('main.home')]);
?>

<h1>
	Home File
</h1>

 

@if(any_errors())
<div class="alert alert-danger">
	<ol>
		@foreach(all_errors() as $error)
	  
					<li><?php echo $error ?></li>
		@endforeach
		</ol>
	</div>
@endif
 

@php
$email_valid = get_error('email');
$mobile_valid = get_error('mobile');
$address_valid = get_error('address');
end_errors();
@endphp
 
 
<form method="post"
	action="<?php echo url('upload'); ?>"
	enctype="multipart/form-data">
	<label>Email: </label>
	<input type="text" name="email"
	 value="<?php echo old('email'); ?>"
		class="form-control <?php echo !empty($email_valid)?'is-invalid':'is-valid'; ?>" />
	<div
		class="<?php echo !empty($email_valid)?'invalid-feedback':'valid-feedback'; ?>">
		<?php echo $email_valid ?>
	</div>

	<label>Mobile: </label>
	<input type="text" name="mobile"
	value="<?php echo old('mobile'); ?>"
		class="form-control <?php echo !empty($mobile_valid)?'is-invalid':'is-valid'; ?>" />
	<div
		class="<?php echo !empty($mobile_valid)?'invalid-feedback':'valid-feedback'; ?>">
		<?php echo $mobile_valid ?>
	</div>

	<label>Address: </label>
	<input type="text" name="address"

	value="<?php echo old('address'); ?>"
		class="form-control <?php echo !empty($address_valid)?'is-invalid':'is-valid'; ?>" />
	<div
		class="<?php echo !empty($address_valid)?'invalid-feedback':'valid-feedback'; ?>">
		<?php echo $address_valid ?>
	</div>
 
	<input type="hidden" name="_method" value="post" />
	<input type="submit" class="btn btn-success" value="Send" />
</form>

<?php view('layout.footer'); ?>