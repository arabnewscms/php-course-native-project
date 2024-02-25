<?php

define('ADMIN', 'admin');

route_get(ADMIN, 'admin.index');
route_get(ADMIN.'/lang', 'controllers.admin.set_lang');

// Admin Authenticate 
route_get(ADMIN.'/login', 'admin.login');
route_post(ADMIN.'/do/login','controllers.admin.login');
route_get(ADMIN.'/logout', 'controllers.admin.logout');

//categories CRUD
// C Create
// R Read or Show
// U Edit and Update 
// D Delete or Destroy 
route_get(ADMIN.'/categories', 'admin.categories.index');
route_get(ADMIN.'/categories/create', 'admin.categories.create');
route_post(ADMIN.'/categories/create', 'controllers.admin.categories.create');
route_get(ADMIN.'/categories/show', 'admin.categories.show');
route_get(ADMIN.'/categories/edit', 'admin.categories.edit');
route_post(ADMIN.'/categories/edit', 'controllers.admin.categories.update');
route_post(ADMIN.'/categories/delete', 'controllers.admin.categories.destroy');