<?php include __DIR__.'/../layouts/header.php'; ?>

<h2>Welcome to Your App User</h2>
<!-- TODO: Add content for normal users -->
<!-- Customize based on the user's role or specific requirements -->

<?php include __DIR__.'/../layouts/footer.php'; ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Library Admin Dashboard</title>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#users">
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#books">
                            Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reservations">
                            Reservations
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <!-- Users Table -->
            <section id="users">
                <h2>Users</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example User Row -->
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>Admin, User</td>
                            <td>
                                <button class="btn btn-sm btn-danger">Delete</button>
                                <button class="btn btn-sm btn-warning">Edit</button>
                            </td>
                        </tr>
                        <!-- Add more user rows as needed -->
                    </tbody>
                </table>
            </section>

            <!-- Books Table -->
            <section id="books">
                <h2>Books</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Book Row -->
                        <tr>
                            <td>1</td>
                            <td>Sample Book</td>
                            <td>John Author</td>
                            <td>Fiction</td>
                            <td>
                                <button class="btn btn-sm btn-danger">Delete</button>
                                <button class="btn btn-sm btn-warning">Edit</button>
                            </td>
                        </tr>
                        <!-- Add more book rows as needed -->
                    </tbody>
                </table>
            </section>

            <!-- Reservations Table -->
            <section id="reservations">
                <h2>Reservations</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Reservation ID</th>
                            <th>Description</th>
                            <th>Reservation Date</th>
                            <th>Return Date</th>
                            <th>Returned</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Reservation Row -->
                        <tr>
                            <td>1</td>
                            <td>Sample Reservation</td>
                            <td>2023-01-01</td>
                            <td>2023-01-15</td>
                            <td>No</td>
                            <td>
                                <button class="btn btn-sm btn-danger">Delete</button>
                                <button class="btn btn-sm btn-warning">Edit</button>
                            </td>
                        </tr>
                        <!-- Add more reservation rows as needed -->
                    </tbody>
                </table>
            </section>

            <!-- Monthly Statistics Table -->
<section id="monthlyStatistics">
    <h2>Monthly Statistics</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Month</th>
                <th>Total Reservations</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Monthly Statistics Row -->
            <tr>
                <td>January</td>
                <td>50</td>
            </tr>
            <!-- Add more monthly statistics rows as needed -->
        </tbody>
    </table>
</section>
        </main>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <script src="dashboard-script.js"></script> -->
<script src="../../Public/Js/registerScript.js"></script>
</body>
</html>
