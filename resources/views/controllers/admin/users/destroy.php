<?php 
$user = db_find('users', request('id'));
redirect_if(empty($user),aurl('users'));
 
db_delete('users', request('id'));
redirect(aurl('users'));