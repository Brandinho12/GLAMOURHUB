<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'connection.php';

// Handle Edit Category
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'edit_category') {
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $image_path = $_POST['existing_image']; // Default to the existing image

        // Check if a new image is uploaded
        if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] == 0) {
            $target_dir = "Uploads/categories/";
            $target_file = $target_dir . basename($_FILES['category_image']['name']);

            if (move_uploaded_file($_FILES['category_image']['tmp_name'], $target_file)) {
                $image_path = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit;
            }
        }

        // Update the category in the database
        $query = "UPDATE categories SET category_name = ?, image_path = ? WHERE category_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $category_name, $image_path, $category_id);

        if ($stmt->execute()) {
            echo "Category updated successfully.";
            header("Location: categories_admin.php");
            exit;
        } else {
            echo "Error updating category: " . $stmt->error;
        }
    }

    // Handle Add Category
    if ($action == 'add_category') {
        $category_name = $_POST['category_name'];
        $image_path = '';

        // Check if an image is uploaded
        if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] == 0) {
            $target_dir = "Uploads/categories/";
            $target_file = $target_dir . basename($_FILES['category_image']['name']);

            if (move_uploaded_file($_FILES['category_image']['tmp_name'], $target_file)) {
                $image_path = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit;
            }
        }

        // Insert the new category into the database
        $query = "INSERT INTO categories (category_name, image_path) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $category_name, $image_path);

        if ($stmt->execute()) {
            echo "Category added successfully.";
            header("Location:category_admin.php");
            exit;
        } else {
            echo "Error adding category: " . $stmt->error;
        }
    }
     // Delete Category
     elseif ($action === 'delete_category') {
        $category_id = $_POST['category_id'];

        // Fetch the image path to delete the image file
        $stmt = $conn->prepare("SELECT image_path FROM categories WHERE category_id = ?");
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $stmt->bind_result($image_path);
        $stmt->fetch();
        $stmt->close();

        // Delete the category from the database
        $stmt = $conn->prepare("DELETE FROM categories WHERE category_id = ?");
        $stmt->bind_param("i", $category_id);

        if ($stmt->execute()) {
            // Delete the image file
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $_SESSION['success'] = "Category deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete category!";
        }
        $stmt->close();

        header("Location: manage_categories.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
