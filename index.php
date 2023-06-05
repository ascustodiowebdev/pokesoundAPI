<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pokemon'])) {
    $pokemon = $_GET['pokemon'];

    // Construct the file path to the Pokémon sound file
    $soundFile = __DIR__ . '/cries/' . strtolower($pokemon) . '.mp3';

    // Check if the sound file exists
    if (file_exists($soundFile)) {
        // Set the appropriate content-type header for the response
        header('Content-Type: audio/mpeg');

        // Send the sound file as the response
        readfile($soundFile);
    } else {
        http_response_code(404); // Not Found
        echo json_encode(['error' => 'Sound file not found for ' . $pokemon]);
    }
} else {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid request']);
}
?>
