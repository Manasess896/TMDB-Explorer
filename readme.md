# TMDB Explorer Documentation

## Overview

TMDB Explorer is a PHP web application that consumes The Movie Database (TMDB) API to display information about movies, TV shows, and actors. It provides an intuitive interface for browsing trending content, searching for specific titles or people, and exploring detailed information.

## Project Structure

```
c:\xampp\htdocs\movies\
├── index.php           # Main application file and router
├── TMDBClient.php      # API client for TMDB interactions
├── config.php          # Configuration values and constants
├── styles.css          # Custom styling for the application
├── .env                # Environment variables (API keys)
└── documentation.md    # This documentation file
```

## Configuration

The application is configured through `config.php`, which loads environment variables from a `.env` file:

- `TMDB_API_KEY` - Your personal API key for authenticating with TMDB API
- `TMDB_IMAGE_BASE_URL` - Base URL for loading images from TMDB
- `TMDB_POSTER_SIZE` - Default poster image size
- `TMDB_BACKDROP_SIZE` - Default backdrop image size

## Core Components

### TMDBClient Class

`TMDBClient.php` contains a PHP class that handles all API interactions with The Movie Database. The class provides methods for fetching various types of data.

#### Available Methods

**General Methods:**
- `makeRequest($endpoint, $params = [])` - Internal method that makes API requests

**Discovery Methods:**
- `getTrending($mediaType = 'all', $timeWindow = 'day')` - Get trending content
- `getPopularMovies($page = 1)` - Get popular movies
- `getPopularTVShows($page = 1)` - Get popular TV shows
- `discoverMovies($params = [])` - Discover movies with filters
- `discoverTVShows($params = [])` - Discover TV shows with filters

**Detail Methods:**
- `getMovieDetails($id)` - Get detailed information about a movie
- `getTVShowDetails($id)` - Get detailed information about a TV show
- `getTVSeasonDetails($tvId, $seasonNumber)` - Get TV season details
- `getTVEpisodeDetails($tvId, $seasonNumber, $episodeNumber)` - Get TV episode details
- `getPersonDetails($personId)` - Get person/actor details

**Category Methods:**
- `getNowPlayingMovies($page = 1)` - Get movies currently in theaters
- `getUpcomingMovies($page = 1)` - Get upcoming movie releases
- `getTopRatedMovies($page = 1)` - Get top rated movies
- `getTopRatedTVShows($page = 1)` - Get top rated TV shows
- `getTVAiringToday($page = 1)` - Get TV shows airing today
- `getTVOnTheAir($page = 1)` - Get TV shows currently on air

**Metadata Methods:**
- `getMovieGenres()` - Get a list of movie genres
- `getTVGenres()` - Get a list of TV show genres

**Recommendation Methods:**
- `getMovieRecommendations($movieId, $page = 1)` - Get movie recommendations
- `getTVShowRecommendations($tvId, $page = 1)` - Get TV show recommendations

**Review Methods:**
- `getMovieReviews($movieId, $page = 1)` - Get movie reviews
- `getTVShowReviews($tvId, $page = 1)` - Get TV show reviews

**People Methods:**
- `getPopularPeople($page = 1)` - Get popular people
- `getTrendingPeople($timeWindow = 'day', $page = 1)` - Get trending people
- `searchPeople($query, $page = 1, $includeAdult = false)` - Search for people

**Search Methods:**
- `search($query, $type = 'multi', $page = 1)` - Search across all categories

### Main Application (index.php)

The `index.php` file serves as both the entry point and router for the application. It dynamically loads different content based on the `page` parameter in the URL.

#### Available Pages

- **Home** (`/?page=home` or just `/`) - Displays trending content and various categories
- **Movies** (`/?page=movies`) - Displays a list of popular movies
- **TV Shows** (`/?page=tvshows`) - Displays a list of popular TV shows
- **Discover** (`/?page=discover`) - Allows filtering and discovering content
- **People** (`/?page=people`) - Shows trending people with search capability
- **Movie Details** (`/?page=movie&id={id}`) - Details for a specific movie
- **TV Show Details** (`/?page=tvshow&id={id}`) - Details for a specific TV show
- **Person Details** (`/?page=person&id={id}`) - Details for a specific person/actor
- **Season Details** (`/?page=season&id={tvId}&season={seasonNumber}`) - Details for a TV show season

## Features

1. **Responsive Design**
   - Uses Bootstrap 5 for a mobile-first, responsive layout
   - Adapts to different screen sizes (mobile, tablet, desktop)

2. **Theme Switching**
   - Toggle between light and dark modes
   - Theme preference is saved in a cookie

3. **Content Display**
   - Hero slideshow on the homepage showcasing trending content
   - Card-based layouts for browsing content
   - Detailed views for movies, TV shows, and people

4. **Search Functionality**
   - Global search across movies, TV shows, and people
   - Dedicated people search on the People page

5. **Navigation**
   - Pagination for browsing through large result sets
   - Intuitive navigation between related content

6. **Animations**
   - Uses AOS (Animate On Scroll) library for subtle animations
   - Smooth transitions between states

## API Integration

The application integrates with The Movie Database (TMDB) API v3. Key aspects of the integration:

- API requests are authenticated using a personal API key
- Image URLs are constructed using the base URL and appropriate size parameters
- Responses are parsed and presented in a user-friendly format
- Error handling for failed requests

## Usage

1. **Browsing Content**
   - Navigate through the main sections using the top navbar
   - Explore trending and popular content on the home page
   - Use the Discover page to apply filters and find specific content

2. **Searching**
   - Use the global search bar in the header for general searches
   - Use the dedicated search on the People page for finding actors and directors

3. **Viewing Details**
   - Click on any content card to view its detailed information
   - Navigate between related content using the links provided

## Technical Requirements

- PHP 7.4 or higher
- Web server (Apache or Nginx)
- CURL extension for PHP
- Valid TMDB API key

## Setup Instructions

1. Clone the repository to your web server directory
2. Create a `.env` file with your TMDB API key: `tmdbApiKey=your_api_key_here`
3. Ensure the web server has read access to all files
4. Access the application through your web browser

## Common Issues

1. **Images Not Loading**
   - Verify that the TMDB_IMAGE_BASE_URL is correctly set
   - Check if your server can access external resources

2. **API Errors**
   - Ensure your API key is valid
   - Check API request limits

3. **Missing Content**
   - Some content may not have complete data from the API
   - The application handles missing data gracefully

## Credits

This application uses the TMDB API but is not endorsed or certified by TMDB. It is developed for educational and personal use only.
