<!DOCTYPE html>
<html>

<!-- head -->
@include('admin.head')
<body>
  <!-- Sidenav -->
@include('admin.sidebar')
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
@include('admin.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          
        </div>
      </div>
    </div>
    <!-- Page content -->
@include('admin.peserta')
      
      <!-- Footer -->

    </div>
  </div>
  <!-- Argon Scripts -->
@include('admin.script')
</body>

</html>
