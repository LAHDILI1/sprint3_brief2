<?php include __DIR__.'/../../layouts/header.php';

?>


<h2>Add User</h2>

<form method="post" >
    <!-- TODO: Add input fields for name and email -->
    <div class="form-group">
        <label for="fullname">fullname:</label>
        <input type="text" class="form-control" name="fullname" id="fullname" required>
    </div>
    <div class="form-group">
        <label for="username">username:</label>
        <input type="username" class="form-control" name="username" id="username" required>
    </div>

    <div class="form-group">
       <select name="role" id="role">
        <option default>select role</option>
       </select>
    </div>

    <!-- TODO: Add submit button -->
    <button type="submit" class="btn btn-primary">Add Employee</button>
</form>

<?php include __DIR__.'/../../layouts/footer.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Book Form</title>
</head>
<body>

<div class="container mt-5">
    <h2>Add New Book</h2>
    <form id="bookForm">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" class="form-control" id="genre" name="genre" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="publicationYear">Publication Year:</label>
            <input type="date" class="form-control" id="publicationYear" name="publicationYear" required>
        </div>
        <div class="form-group">
            <label for="totalCopies">Total Copies:</label>
            <input type="number" class="form-control" id="totalCopies" name="totalCopies" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Add your custom JavaScript logic here
    document.getElementById('bookForm').addEventListener('submit', function (event) {
        event.preventDefault();

        // Add logic to handle form submission (e.g., AJAX request to save data)
        // You can access form data using: event.target.title.value, event.target.author.value, etc.
    });
</script>

</body>
</html>
