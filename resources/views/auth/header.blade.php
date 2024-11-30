<nav class="main-header navbar navbar-expand navbar-warning navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>
    
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Username display -->
        

        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-th-large"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Modules</span>
                <?php
                    $data = DB::table('public.modules')->orderBy('module_id')->get();
                    foreach ($data as $datakey) {
                        // Using shorthand PHP to echo module names
                        echo '<a onclick="get_menu(' . $datakey->module_id . ')" class="dropdown-item">' . htmlspecialchars($datakey->module_name) . '</a>';
                        echo '<div class="dropdown-divider"></div>';
                    }
                ?>
            </div>
            
        </li>

        <!-- Logout Dropdown -->
        <li class="nav-item dropdown align-items-center">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              welcom  {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
<script>
   function get_menu(module_id) {
    $.ajax({
        url: '{{ url("/admin/get_menu") }}',
        method: 'POST',
        data: { id: module_id }, // Send the module ID
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
        },
        success: function(response) {
            // Handle the response
        },
        error: function(xhr, status, error) {
            // Handle error
        }
    });
}

</script>
