<?php
// Load environment variables from .env file
$env = parse_ini_file('.env');

// Get TMDB API key
define('TMDB_API_KEY', $env['tmdbApiKey']);
define('TMDB_IMAGE_BASE_URL', 'https://image.tmdb.org/t/p/');
define('TMDB_POSTER_SIZE', 'w500');
define('TMDB_BACKDROP_SIZE', 'original');
?>
