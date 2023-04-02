<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0-beta2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
  <style>
    a.active.brand-link {
        background: black;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        
      <a href="{{ route('topup-users.index') }}" class="brand-link {{ (Request::route()->getName() == 'topup-users.index') ? 'active' : '' }}">
        <span class="brand-text font-weight-light">Max Topup(Count Total)</span>
      </a>
      
      <a href="{{ route('topup-users.indexByAmount') }}" class="brand-link {{ (Request::route()->getName() == 'topup-users.indexByAmount') ? 'active' : '' }}">
        <span class="brand-text font-weight-light">Max Topup(Amount Total)</span>
      </a>
      
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          </ul>
        </nav>
      </div>
    </aside>
    
    <div class="content-wrapper">
      @yield('content')
    </div>
    
    <footer class="main-footer">
      <strong>&copy; 2023 My App.</strong> All rights reserved.
    </footer>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
