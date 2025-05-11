<?php
// First check for Heroku environment variables
$tmdb_api_key = getenv('TMDB_API_KEY');

// If not found, try to load from .env file as a fallback
if (!$tmdb_api_key) {
    if (file_exists('.env')) {
        $env = parse_ini_file('.env');
        $tmdb_api_key = $env['TMDB_API_KEY'] ?? null;
    }
}

// Check if we have an API key from either source
if (!$tmdb_api_key) {
    die('TMDB API key not found. Please set the TMDB_API_KEY environment variable.');
}

// Define constants
define('TMDB_API_KEY', $tmdb_api_key);
define('TMDB_IMAGE_BASE_URL', 'https://image.tmdb.org/t/p/');
define('TMDB_POSTER_SIZE', 'w500');
define('TMDB_BACKDROP_SIZE', 'original');
?>
