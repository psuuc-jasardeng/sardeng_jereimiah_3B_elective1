<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #d3d3d3 !important; /* Light gray background */
            color: #333333 !important; /* Dark gray text for better contrast */
        }
        .card {
            border: 2px solid black !important;
            background-color: #ffffff !important; /* Default white background for cards */
            color:rgb(255, 255, 255) !important; /* Fixed: Dark gray text inside cards */
        }
        .card-body {
            color:rgb(255, 255, 255) !important; /* Ensure card body text is dark gray */
        }
        .navbar {
            background-color: black !important;
        }
        .navbar-text {
            color: white !important;
        }
        /* Vertically center all navbar elements */
        .navbar .navbar-brand,
        .navbar .navbar-text,
        .navbar .btn {
            display: flex;
            align-items: center;
            height: 100%;
        }
        /* Ensure the navbar-nav aligns its children properly */
        .navbar-nav {
            display: flex;
            align-items: center;
        }
        /* Adjust the form to align with the text */
        .navbar-nav form {
            display: inline-flex;
            align-items: center;
        }
        /* Adjust text colors for better contrast */
        h1, h3, h5, p, small, strong {
            color: #333333 !important; /* Dark gray text for headings and paragraphs */
        }
        .form-select {
            background-color: #ffffff !important; /* White background for dropdowns */
            color: #333333 !important; /* Dark gray text */
            border-color: #cccccc !important; /* Light gray border */
        }
        .list-group-item {
            background-color: #ffffff !important; /* Default white background for comments */
            color: #333333 !important; /* Dark gray text */
            border-color: #cccccc !important; /* Light gray border */
        }
        /* Adjust pagination links */
        .pagination .page-link {
            background-color: #ffffff !important;
            color: #333333 !important;
            border-color: #cccccc !important;
        }
        .pagination .page-item.active .page-link {
            background-color: #cccccc !important;
            color: #333333 !important;
        }
        /* Adjust alerts for better contrast */
        .alert-success {
            color: #155724 !important; /* Dark green text for success alert */
        }
        .alert-danger {
            color: #721c24 !important; /* Dark red text for error alert */
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('blog.index') }}">Blog</a>
            <div class="navbar-nav ms-auto">
                @if(session('user'))
                    <span class="navbar-text me-3">
                        Welcome, 
                        @if(is_array(session('user')) && isset(session('user')['name']))
                            {{ session('user')['name'] }}
                        @else
                            {{ session('user') }}
                        @endif
                        
                    </span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Logout</button>
                    </form>
                @else
                    <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Auto-dismiss success alert
            const successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.classList.remove('show');
                    successAlert.classList.add('fade');
                    setTimeout(() => {
                        successAlert.style.display = 'none';
                    }, 150);
                }, 5000);
            }

            // Auto-dismiss error alert
            const errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                setTimeout(() => {
                    errorAlert.classList.remove('show');
                    errorAlert.classList.add('fade');
                    setTimeout(() => {
                        errorAlert.style.display = 'none';
                    }, 150);
                }, 5000);
            }
        });
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Include jQuery (required by Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('scripts')
</body>
</html>