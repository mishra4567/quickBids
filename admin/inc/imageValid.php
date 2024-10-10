<?php
/**
 * Default Image Velidation 
 * Profile Photo
 */
// echo $vendorId;
$vendorId = $_SESSION['QBUSER_ID'];
$selectVendorSql = mysqli_query($con, "SELECT * FROM qb_dash_user WHERE id='$vendorId'");
$vendorDetails = mysqli_fetch_assoc($selectVendorSql);

// Check if the 'image' field exists, is not empty, and the file actually exists on the server
if (empty($vendorDetails['image']) || !file_exists('../media/images/' . $vendorDetails['image'])) {
    // Use default image if no image is uploaded or the file doesn't exist
    $vendorPhotoPath = '../media/images/photo-1528892952291-009c663ce843.avif';
} else {
    // Use the vendor's uploaded image
    $vendorPhotoPath = '../media/images/' . $vendorDetails['image'];
}

/**
 * Default Image Velidation 
 * Background Photo
 */
$vendorBackImage = '../media/images/pexels-shonejai-445753-1227511.jpg';
// $vendorName='';