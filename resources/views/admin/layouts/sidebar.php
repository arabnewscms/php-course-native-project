<div class="container-fluid">
  <div class="row">
  <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ aurl('categories') }}">
              <i class="fa-regular fa-rectangle-list"></i>
                {{ trans('admin.categories') }}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ aurl('news') }}">
              <i class="fa-regular fa-newspaper"></i>
                {{ trans('admin.news') }}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ aurl('comments') }}">
              <i class="fa-regular fa-comments"></i>
                {{ trans('admin.comments') }}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ aurl('news') }}">
              <i class="fa-regular fa-newspaper"></i>
                {{ trans('admin.news') }}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ aurl('users') }}">
              <i class="fa fa-users"></i>
                {{ trans('admin.users') }}
              </a>
            </li>
             
          </ul>

          
          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                Settings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ url('admin/logout') }}">
              <i class="fa-solid fa-right-from-bracket"></i>
                {{ trans('admin.logout') }}
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>


