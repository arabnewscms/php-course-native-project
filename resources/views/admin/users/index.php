<?php
view('admin.layouts.header', ['title'=>trans('admin.users')]);

$users = db_paginate("users", "", 12);
?>
 
	<div
		class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2> {{ trans('admin.users') }}</h2>
		<a class="btn btn-primary" href="{{ aurl('users/create') }}"><i class="fa-solid fa-plus"></i> {{ trans('admin.create') }}</a>
	</div>
	<div class="table-responsive small">
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">{{ trans('user.name') }}</th>
					<th scope="col">{{ trans('user.email') }}</th>
					<th scope="col">{{ trans('user.mobile') }}</th>
					<th scope="col">{{ trans('user.user_type') }}</th>
					<th scope="col">{{ trans('admin.action') }}</th>
				</tr>
			</thead>
			<tbody>
				<?php while($user = mysqli_fetch_assoc($users['query'])): ?>
				<tr>
					<td>{{ $user['id'] }}</td>
					<td>{{ $user['name'] }}</td>
					<td>{{ $user['email'] }}</td>
					<td>{{ $user['mobile'] }}</td>
					<td>{{ trans('user.'.$user['user_type']) }}</td>
					<td>
						<a href="{{ aurl('users/show?id='.$user['id']) }}"><i
								class="fa-regular fa-eye"></i></a>
						<a href="{{ aurl('users/edit?id='.$user['id']) }}"><i
								class="fa-solid fa-pen-to-square"></i></a>
           			  {{ delete_record(aurl('users/delete?id='.$user['id'])) }}   
					</td>
				</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
	{{ $users['render'] }}
 
<?php
view('admin.layouts.footer');
?>