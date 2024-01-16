<?php 
include "header.php";
if(!isset($_SESSION)){
    session_start();
}

/*
if (isset($_POST["submit_search"])) {
    // Get the search query from the form
    $searchQuery = $_POST['search_query'];

    // Execute the query with the cleaned search query
    $results = $user->searchByAuthor($searchQuery);

    echo "<h2>Search Results for '$searchQuery'</h2>";
    var_dump($results);

    if ($results) {
        foreach ($results as $row) {
            echo "<p>{$row['book_title']}</p>";
        }
    } else {
        echo "No results found.";
    }
} else {
    echo "Invalid access to this script.";
}
*/

$categories = $conn->query("SELECT * FROM table_category LIMIT 5");


?>

<h1 class="text-center mt-5">Search For Book</h1>
<div class="d-flex justify-content-center">
    <form method='post' action="" class="d-flex">
        <input class="form-control me-2" type="text" name="search_query" id="search_query" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="submit_search">Search</button>
    </form>
</div>

<div class="Categories">
    <?php
    foreach($categories as $row){
        echo "
    <div class='card' style='width: 18rem;'>
            <img src='img/Siu.jpg' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>{$row['category_name']}</h5>
            <p class='card-text'>Some quick </p>
            <a href='singlecategory.php?cateIdToEdit={$row['category_id']}' class='btn btn-primary'>Read More</a>
        </div>
    </div>
    ";
    }?>
</div>