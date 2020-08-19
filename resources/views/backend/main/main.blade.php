<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="/backend/css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>
	<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            @include('backend.layouts.header')
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('backend.layouts.sidebar')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    @include('backend.layouts.footer')
                </footer>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="/backend/js/scripts.js"></script>
</body>
</html>