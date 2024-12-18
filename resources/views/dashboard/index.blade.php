<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <title>Advanced Interactive Dashboard</title>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #3498db;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --text-light: #ffffff;
            --text-dark: #2c3e50;
            --sidebar-width: 250px;
            --header-height: 72px;
            --transition-speed: 0.3s;
        }

        /* Existing styles from previous version... */
        [Previous styles remain the same until the new additions below]

        /* New Interactive Elements Styles */
        .search-bar {
            position: relative;
            max-width: 300px;
        }

        .search-bar input {
            width: 100%;
            padding: 0.5rem 2.5rem 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .search-bar input:focus {
            box-shadow: 0 0 0 2px var(--accent-color);
            border-color: var(--accent-color);
        }

        .search-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        /* Data Visualization Sections */
        .chart-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .chart-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .chart-title {
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Interactive Calendar */
        .calendar-widget {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-top: 1.5rem;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
        }

        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .calendar-day:hover {
            background-color: var(--accent-color);
            color: white;
        }

        /* Task Management */
        .task-list {
            margin-top: 1.5rem;
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
        }

        .task-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .task-item:hover {
            background-color: var(--light-color);
        }

        .task-checkbox {
            margin-right: 1rem;
        }

        .task-content {
            flex: 1;
        }

        .task-actions {
            display: flex;
            gap: 0.5rem;
        }

        /* Progress Indicators */
        .progress-ring {
            position: relative;
            width: 120px;
            height: 120px;
        }

        .progress-ring-circle {
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }

        .progress-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* New Widget Styles */
        .widget-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .widget {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }

        /* Theme Switcher */
        .theme-switcher {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: white;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .theme-switcher:hover {
            transform: scale(1.1);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .chart-grid {
                grid-template-columns: 1fr;
            }

            .widget-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Previous navbar structure remains the same -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/api/placeholder/40/40" alt="ShanII Logo" class="logo-img">
                ShanII
            </a>
            <div class="search-bar ms-4 d-none d-lg-block">
                <input type="text" placeholder="Search..." class="form-control">
                <i class="fas fa-search search-icon"></i>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white position-relative" href="#" id="notificationsDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">New student enrollment</a>
                            <a class="dropdown-item" href="#">Course update available</a>
                            <a class="dropdown-item" href="#">System maintenance</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <!-- Enhanced Sidebar -->
        <div class="sidebar">
            <div class="user-profile text-center py-4">
                <img src="/api/placeholder/80/80" alt="User Avatar" class="rounded-circle mb-2">
                <h6 class="text-white mb-0">Welcome, Admin</h6>
            </div>
            <a class="sidebar-link active" href="#">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a class="sidebar-link" href="#">
                <i class="fas fa-user-graduate"></i> Students
            </a>
            <a class="sidebar-link" href="#">
                <i class="fas fa-book"></i> Courses
            </a>
            <a class="sidebar-link" href="#">
                <i class="fas fa-chalkboard-teacher"></i> Teachers
            </a>
            <a class="sidebar-link" href="#">
                <i class="fas fa-calendar-alt"></i> Schedule
            </a>
            <a class="sidebar-link" href="#">
                <i class="fas fa-chart-bar"></i> Reports
            </a>
            <a class="sidebar-link" href="#">
                <i class="fas fa-cog"></i> Settings
            </a>
        </div>

        <!-- Enhanced Content Area -->
        <div class="content">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Dashboard Overview</h2>
                <div class="btn-group">
                    <button class="btn btn-outline-primary active">Today</button>
                    <button class="btn btn-outline-primary">Week</button>
                    <button class="btn btn-outline-primary">Month</button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="dashboard-card card bg-primary text-white">
                        <div class="stat-card">
                            <i class="fas fa-user-graduate stat-icon"></i>
                            <div class="stat-number">{{ $totalStudents }}</div>
                            <div>Total Students</div>
                            <div class="progress mt-2" style="height: 5px;">
                                <div class="progress-bar bg-white" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Similar cards for other stats -->
            </div>

            <!-- Data Visualization Section -->
            <div class="chart-grid">
                <div class="chart-card">
                    <div class="chart-header">
                        <h5 class="chart-title">Student Enrollment Trends</h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                This Year
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                <li><a class="dropdown-item" href="#">Last Year</a></li>
                                <li><a class="dropdown-item" href="#">All Time</a></li>
                            </ul>
                        </div>
                    </div>
                    <canvas id="enrollmentChart"></canvas>
                </div>

                <div class="chart-card">
                    <div class="chart-header">
                        <h5 class="chart-title">Course Distribution</h5>
                    </div>
                    <canvas id="courseDistributionChart"></canvas>
                </div>
            </div>

            <!-- Task Management Section -->
            <div class="task-list">
                <h5 class="mb-3">Pending Tasks</h5>
                <div class="task-item">
                    <input type="checkbox" class="task-checkbox">
                    <div class="task-content">
                        <h6 class="mb-1">Review new course proposals</h6>
                        <small class="text-muted">Due today</small>
                    </div>
                    <div class="task-actions">
                        <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                <!-- More task items -->
            </div>

            <!-- Calendar Widget -->
            <div class="calendar-widget">
                <div class="calendar-header">
                    <h5>Schedule</h5>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-chevron-left"></i></button>
                        <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
                <div class="calendar-grid" id="calendarGrid">
                    <!-- Calendar days will be inserted by JavaScript -->
                </div>
            </div>

            <!-- Additional Widgets -->
            <div class="widget-grid">
                <div class="widget">
                    <h5 class="mb-3">Recent Activities</h5>
                    <div class="activity-timeline">
                        <!-- Activity items -->
                    </div>
                </div>

                <div class="widget">
                    <h5 class="mb-3">Performance Metrics</h5>
                    <div class="progress-ring">
                        <svg width="120" height="120">
                            <circle cx="60" cy="60" r="54" fill="none" stroke="#eee" stroke-width="12"/>
                            <circle class="progress-ring-circle" cx="60" cy="60" r="54" fill="none" stroke="var(--primary-color)" stroke-width="12" stroke-dasharray="339.292" stroke-dashoffset="100"/>
                        </svg>
                        <div class="progress-
<!-- Continuing from where we left off... -->

                        <div class="progress-label">85%</div>
                    </div>
                </div>

                <div class="widget">
                    <h5 class="mb-3">Quick Notes</h5>
                    <div class="note-editor">
                        <textarea class="form-control mb-2" rows="3" placeholder="Write a note..."></textarea>
                        <button class="btn btn-primary btn-sm">Save Note</button>
                    </div>
                    <div class="notes-list mt-3">
                        <div class="note-item p-2 border-bottom">
                            <small class="text-muted">Today, 2:30 PM</small>
                            <p class="mb-0">Schedule faculty meeting for next week</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Theme Switcher -->
    <div class="theme-switcher" id="themeSwitcher">
        <i class="fas fa-sun"></i>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p class="m-0">&copy; 2024 Shah Nawaz. All Rights Reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize Charts
        const initializeCharts = () => {
            // Enrollment Trends Chart
            const enrollmentCtx = document.getElementById('enrollmentChart').getContext('2d');
            new Chart(enrollmentCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Student Enrollments',
                        data: [65, 78, 90, 85, 95, 110],
                        borderColor: '#3498db',
                        tension: 0.3,
                        fill: true,
                        backgroundColor: 'rgba(52, 152, 219, 0.1)'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Course Distribution Chart
            const courseCtx = document.getElementById('courseDistributionChart').getContext('2d');
            new Chart(courseCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Science', 'Mathematics', 'Languages', 'Arts', 'Technology'],
                    datasets: [{
                        data: [30, 25, 20, 15, 10],
                        backgroundColor: [
                            '#3498db',
                            '#2ecc71',
                            '#f1c40f',
                            '#e74c3c',
                            '#9b59b6'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        };

        // Initialize Calendar
        const initializeCalendar = () => {
            const calendarGrid = document.getElementById('calendarGrid');
            const daysInMonth = 31;
            const today = new Date().getDate();

            for (let i = 1; i <= daysInMonth; i++) {
                const dayElement = document.createElement('div');
                dayElement.className = `calendar-day ${i === today ? 'bg-primary text-white' : ''}`;
                dayElement.textContent = i;
                dayElement.addEventListener('click', () => {
                    alert(`Selected date: ${i}`);
                });
                calendarGrid.appendChild(dayElement);
            }
        };

        // Theme Switcher Functionality
        const initializeThemeSwitcher = () => {
            const themeSwitcher = document.getElementById('themeSwitcher');
            let isDarkMode = false;

            themeSwitcher.addEventListener('click', () => {
                isDarkMode = !isDarkMode;
                document.body.classList.toggle('dark-mode');
                themeSwitcher.innerHTML = isDarkMode ?
                    '<i class="fas fa-moon"></i>' :
                    '<i class="fas fa-sun"></i>';
            });
        };

        // Task Management
        const initializeTaskManagement = () => {
            document.querySelectorAll('.task-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', (e) => {
                    const taskItem = e.target.closest('.task-item');
                    if (e.target.checked) {
                        taskItem.style.opacity = '0.5';
                        taskItem.style.textDecoration = 'line-through';
                    } else {
                        taskItem.style.opacity = '1';
                        taskItem.style.textDecoration = 'none';
                    }
                });
            });
        };

        // Initialize Progress Rings
        const initializeProgressRings = () => {
            document.querySelectorAll('.progress-ring-circle').forEach(circle => {
                const radius = circle.r.baseVal.value;
                const circumference = radius * 2 * Math.PI;
                const percent = 85; // Example progress percentage

                circle.style.strokeDasharray = `${circumference} ${circumference}`;
                circle.style.strokeDashoffset = circumference - (percent / 100) * circumference;
            });
        };

        // Search Functionality
        const initializeSearch = () => {
            const searchInput = document.querySelector('.search-bar input');
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                // Implement search functionality here
                console.log(`Searching for: ${searchTerm}`);
            });
        };

        // Notification System
        const initializeNotifications = () => {
            const notificationDropdown = document.getElementById('notificationsDropdown');
            notificationDropdown.addEventListener('click', () => {
                const badge = notificationDropdown.querySelector('.notification-badge');
                if (badge) {
                    badge.style.display = 'none';
                }
            });
        };

        // Initialize all components
        document.addEventListener('DOMContentLoaded', () => {
            initializeCharts();
            initializeCalendar();
            initializeThemeSwitcher();
            initializeTaskManagement();
            initializeProgressRings();
            initializeSearch();
            initializeNotifications();
        });
    </script>
     <canvas id="enrollmentChart"></canvas>
     <script>
         document.addEventListener('DOMContentLoaded', function () {
             const ctx = document.getElementById('enrollmentChart').getContext('2d');
             new Chart(ctx, {
                 type: 'line',
                 data: {
                     labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                     datasets: [{
                         label: 'Enrollments',
                         data: [50, 75, 100, 125, 150, 200],
                         backgroundColor: 'rgba(52, 152, 219, 0.2)',
                         borderColor: 'rgba(52, 152, 219, 1)',
                         borderWidth: 2
                     }]
                 },
                 options: {
                     responsive: true,
                     plugins: {
                         legend: { display: true },
                         tooltip: { enabled: true }
                     }
                 }
             });
         });
     </script>
</body>
</html>
