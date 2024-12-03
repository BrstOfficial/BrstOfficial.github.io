<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a review is submitted
    $review = trim($_POST['review'] ?? '');
    if (!empty($review)) {
        // Sanitize the input to prevent script injection
        $review = htmlspecialchars($review, ENT_QUOTES, 'UTF-8');

        // Save the review to the file
        $file = 'reviews.txt';
        file_put_contents($file, $review . PHP_EOL, FILE_APPEND);

        // Redirect to a thank-you page after submission
        header("Location: Thank.html");
        exit;
    } else {
        // Redirect back to the review form with an error status
        header("Location: review.html?status=error");
        exit;
    }
}
?>
