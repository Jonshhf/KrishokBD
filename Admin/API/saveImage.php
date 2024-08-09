<?php
// Check if image file is selected
if(isset($_FILES['image'])){
    // Get image details
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    
    // Specify target directory
    $target_dir = "uploads/";

    // Generate a unique filename based on current timestamp
    $timestamp = time(); // Get current Unix timestamp
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION); // Get the file extension
    $new_file_name = $timestamp . '.' . $file_extension; // Create new filename with timestamp and original extension
    
    // Move uploaded image to target directory with the new filename
    if(move_uploaded_file($file_tmp, $target_dir . $new_file_name)){
        // Image uploaded successfully
        $image_url = $target_dir . $new_file_name;
        echo $image_url;
    }else{
        // Error uploading image
        echo "Error uploading image.";
    }
}else{
    // No image file selected
    echo "No image file selected.";
}
?>
