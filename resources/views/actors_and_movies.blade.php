
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actors and Movies Search</title>
    <style>
      html {
        padding: 30px;
      }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 5px;
        }
        ul li a {
            color: blue;
            text-decoration: none;
        }
        ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Actors and Movies Search</h1>

<?php
echo "<form method='GET'>";
echo "<label for='search'>Search Actors:</label>";
echo "<input type='text' name='search' id='search'>";
echo "<button type='submit'>Search</button>";
echo "</form>";

$filteredActors = [];
if (isset($_GET['search']) && trim($_GET['search']) !=='' ) {
    $searchTerm = $_GET['search'];

    foreach ($actors as $actor) {
        if (strpos(strtolower($actor['name']), strtolower($searchTerm)) !== false) {
            $filteredActors[] = $actor;
        }
    }
} else {
    $filteredActors = $actors;
}

if (empty($filteredActors)) {
    echo "<br>No actors found. Please try again.";

} else {
    foreach ($filteredActors as $actor) {
        echo "<h2>{$actor['name']}</h2>";
        echo "<ul>";
        foreach ($actor['movies'] as $movie) {
            echo "<li>{$movie['title']} ({$movie['year']})</li>";
        }
        echo "</ul>";
    }
}
?>

</body>
</html>