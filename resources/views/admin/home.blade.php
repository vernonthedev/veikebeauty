<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('admin.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('admin.navbar')
        @include('admin.body')
    </main>

    @include('admin.settings')
    @include('admin.scripts')
</body>

</html>
