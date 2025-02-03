<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Manage Categories</h2>

        <!-- Add Category Form -->
        <form action="manage_categories.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add_category">
            <div class="form-group">
                <label for="category_name">Category Name:</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            <div class="form-group">
                <label for="category_image">Category Image:</label>
                <input type="file" class="form-control-file" id="category_image" name="category_image" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>

        <!-- Categories List with Edit and Delete -->
        <hr>
        <h3>Existing Categories</h3>
        <div class="list-group">
            <?php
            require 'connection.php';
            // Fetch and display categories from the database
            $query = "SELECT * FROM categories";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                echo '<div class="list-group-item">';
                echo '<h5>' . $row['category_name'] . '</h5>';
                echo '<img src="' . $row['image_path'] . '" alt="' . $row['category_name'] . '" width="100">';
                echo '<form action="manage_categories.php" method="POST" class="mt-3 d-inline">';
                echo '<input type="hidden" name="action" value="edit_category">';
                echo '<input type="hidden" name="category_id" value="' . $row['category_id'] . '">';
                echo '<input type="hidden" name="existing_image" value="' . $row['image_path'] . '">';
                echo '<button type="submit" class="btn btn-warning">Edit</button>';
                echo '</form>';
                echo '<form action="manage_categories.php" method="POST" class="mt-3 d-inline ml-2">';
                echo '<input type="hidden" name="action" value="delete_category">';
                echo '<input type="hidden" name="category_id" value="' . $row['category_id'] . '">';
                echo '<button type="submit" class="btn btn-danger">Delete</button>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>