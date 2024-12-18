<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Crud Application</title>
    <style>
        /* General Styles */
        html, body {
            height: 100%;
            margin: 0;
            overflow-x: hidden;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar Styles */
        .navbar-custom {
            background-color: #0d9992;
            padding: 10px 20px;
        }

        .navbar-custom .navbar-brand {
            color: white;
            display: flex;
            align-items: center;
        }

        .navbar-toggler {
            border-color: rgba(255,255,255,0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.5)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .custom-logo {
        width: 50px; /* Adjust the width as needed */
        height: auto; /* Maintain aspect ratio */
        border-radius: 50%;
        }
         /* Adjust text alignment with logo */
        .navbar-brand {
        display: flex;
        align-items: center;
        }

        /* Search Form */
        .search-form {
            position: relative;
            margin: 0 15px;
        }

        .search-form .form-control {
            padding-right: 35px;
            border-radius: 20px;
        }

        .search-form .search-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            pointer-events: none;
        }

        /* Wrapper and Sidebar */
        .wrapper {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 200px;
            background-color: #035e81;
            min-height: calc(100vh - 56px - 76px); /* Navbar and footer height */
            position: sticky;
            top: 0;
            height: 100%;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        /* Sidebar Navigation */
        .sidebar a, .dropdown-btn {
            display: block;
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            transition: background-color 0.3s;
            width: 100%;
            text-align: left;
            border: none;
            background: none;
            cursor: pointer;
            outline: none;
            font-size: 14px;
        }

        .sidebar a:hover, .dropdown-btn:hover {
            background-color: #007bff;
        }

        .dropdown-container {
            display: none;
            background-color: #062951;
            padding-left: 8px;
        }

        .dropdown-container a {
            padding: 10px 16px 10px 32px;
        }

        .dropdown-btn.active {
            background-color: #007bff;
        }

        /* Content Area */
        .content {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
            min-height: calc(100vh - 56px - 76px);
        }

        /* Footer */
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            margin-top: auto;
        }

        /* Responsive Design */
        @media (max-width: 991.98px) {
            .search-form {
                width: 100%;
                margin: 10px 0;
            }

            .navbar-collapse {
                background-color: #127e04;
                padding: 10px;
                border-radius: 5px;
            }
        }

        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                position: static;
                min-height: auto;
            }

            .content {
                width: 100%;
                min-height: auto;
            }

            .dropdown-container {
                position: static;
            }
        }

        /* Navbar Dropdown */
        .navbar-custom .dropdown-menu {
            margin-top: 8px;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-custom .dropdown-item {
            padding: 8px 16px;
        }

        .navbar-custom .dropdown-item i {
            margin-right: 8px;
            width: 16px;
        }

        .navbar-custom .dropdown-item:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('/images/shanii.png') }}" alt="ShanII Logo" class="logo-img custom-logo">
            ShanII
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/Contact')}}">
                        <i class="fa fa-fw fa-envelope"></i> Contact
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center flex-column flex-lg-row">
                <form class="search-form">
                    <input class="form-control" type="search" placeholder="Search...">
                    <i class="fa fa-search search-icon"></i>
                </form>

                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown"
                       data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-fw fa-user"></i> Account
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-sign-in"></i> Login
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-user-circle"></i> Profile
                        </a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content wrapper -->
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <a class="active" href="{{url('/dashboard')}}">
                <i class="fa fa-fw fa-home"></i> Home
            </a>

            <!-- Sidebar Dropdowns -->
            <button class="dropdown-btn">
                <i class="fa fa-fw fa-user"></i> Student
                <i class="fa fa-caret-down float-right"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{url('/students')}}">View Students</a>
                <a href="{{url('/students/create')}}">Add Student</a>
                <a href="{{url('/students/report')}}">Student Report</a>
            </div>

            <button class="dropdown-btn">
                <i class="fa fa-fw fa-users"></i> Teacher
                <i class="fa fa-caret-down float-right"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{url('/teachers')}}">View Teachers</a>
                <a href="{{url('/teachers/create')}}">Add Teacher</a>
                <a href="{{url('/teachers/report')}}">Teacher Report</a>
            </div>

            <button class="dropdown-btn">
                <i class="fa fa-fw fa-users"></i> Employee
                <i class="fa fa-caret-down float-right"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{url('/employees')}}">View Employee</a>
                <a href="{{url('/employees/create')}}">Add Employee</a>
                <a href="{{url('/employees/report')}}">Employee Report</a>
            </div>

            <button class="dropdown-btn">
                <i class="fa fa-fw fa-book"></i> Course
                <i class="fa fa-caret-down float-right"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{url('/courses')}}">View Course</a>
                <a href="{{url('/courses/create')}}">Add Course</a>
                <a href="{{url('/courses/report')}}">Course Report</a>
            </div>

            <button class="dropdown-btn">
                <i class="fa fa-fw fa-book"></i> Book
                <i class="fa fa-caret-down float-right"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{url('/books')}}">View Book</a>
                <a href="{{url('/books/create')}}">Add Book</a>
                <a href="{{url('/books/report')}}">Book Report</a>
            </div>

            <button class="dropdown-btn">
                <i class="fa fa-fw fa-bookmark"></i> Enrollment
                <i class="fa fa-caret-down float-right"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{url('/enrollments')}}">View Enrollment</a>
                <a href="{{url('/enrollments/create')}}">Add Enrollment</a>
            </div>

            <button class="dropdown-btn">
                <i class="fa fa-fw fa-file"></i> Exam
                <i class="fa fa-caret-down float-right"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{url('/exam')}}">View Exam</a>
                <a href="{{url('/exam/create')}}">Add Exam</a>
            </div>

            <button class="dropdown-btn">
                <i class="fa fa-fw fa-star"></i> Result
                <i class="fa fa-caret-down float-right"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{url('/result')}}">View Result</a>
                <a href="{{url('/result/create')}}">Add Result</a>
            </div>

            <button class="dropdown-btn">
                <i class="fa fa-fw fa-money"></i> Fee
                <i class="fa fa-caret-down float-right"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{url('/fee')}}">View Fee</a>
                <a href="{{url('/fee/create')}}">Add Fee</a>
            </div>

            <button class="dropdown-btn">
                <i class="fa fa-fw fa-gear"></i> Setting
                <i class="fa fa-caret-down float-right"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{url('/setting')}}">View Profile</a>
                <a href="{{url('/setting/create')}}">Add User</a>
                <a href="{{url('/setting/report')}}">Setting Help</a>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        <p>&copy; 2024 Shah Nawaz. All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Dropdown Button Functionality
        var dropdowns = document.querySelectorAll('.dropdown-btn');
        dropdowns.forEach(function(dropdown) {
            dropdown.addEventListener('click', function() {
                this.classList.toggle('active');
                var dropdownContent = this.nextElementSibling;
                dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
            });
        });
    </script>
</body>
</html>
