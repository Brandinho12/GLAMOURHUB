<?php
session_start();
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit_category') {
    
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $image_path = $_POST['existing_image']; // Default to the existing image

    // Check if a new image is uploaded
    if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] == 0) {
        $target_dir = "uploads/categories/";
        $target_file = $target_dir . basename($_FILES['category_image']['name']);
        
        if (move_uploaded_file($_FILES['category_image']['tmp_name'], $target_file)) {
            $image_path = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    }
    ?>
    <?php

    // Update the category in the database
    $query = "UPDATE categories SET name = ?, image_path = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $category_name, $image_path, $category_id);

    if ($stmt->execute()) {
        echo "Category updated successfully.";
        header("Location: categories_admin.php");
        exit;
    } else {
        echo "Error updating category.";
    }
    ?>
    <?php

// Check if the form to add a category is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add_category') {
    
    $category_name = $_POST['category_name'];
    $image_path = '';

    // Check if an image is uploaded
    if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] == 0) {
        $target_dir = "uploads/categories/";
        $target_file = $target_dir . basename($_FILES['category_image']['name']);
        
        // Move the uploaded file to the server
        if (move_uploaded_file($_FILES['category_image']['tmp_name'], $target_file)) {
            $image_path = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    }
    ?>
<?php
    // Insert the new category into the database
    $query = "INSERT INTO categories (name, image_path) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $category_name, $image_path);

    if ($stmt->execute()) {
        echo "Category added successfully.";
        header("Location: categories_admin.php");
        exit;
    } else {
        echo "Error adding category.";
    }
    
}
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit_category') {
    
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $image_path = $_POST['existing_image']; // Default to the existing image

    // Check if a new image is uploaded
    if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] == 0) {
        $target_dir = "uploads/categories/";
        $target_file = $target_dir . basename($_FILES['category_image']['name']);
        
        if (move_uploaded_file($_FILES['category_image']['tmp_name'], $target_file)) {
            $image_path = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    }

    // Update the category in the database
    $query = "UPDATE categories SET name = ?, image_path = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $category_name, $image_path, $category_id);

    if ($stmt->execute()) {
        echo "Category updated successfully.";
        header("Location: categories_admin.php");
        exit;
    } else {
        echo "Error updating category.";
    }
    
    $stmt->close();
    $conn->close();
}
?>

