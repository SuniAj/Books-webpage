<?php 
include "header.php";
if(!isset($_SESSION)){
    session_start();
}


$categories = $conn->query("SELECT * FROM table_category LIMIT 5");
$recentbooks = $conn->query("SELECT * FROM table_book WHERE added_date >= '2024-01-16 00:00:00' AND added_date < '2024-01-17 00:00:00' LIMIT 8");
$featured = $conn->query("SELECT * FROM table_book WHERE book_featured = 1 LIMIT 5");


?>

<h1 class="text-center mt-5">Search For Book</h1>
<div class="d-flex justify-content-center">
    <form method='post' action='search.php' class="d-flex">
        <input class="form-control me-2" type="text" name="search_query" id="search_query" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="submit_search">Search</button>
    </form>
</div>

<div class="pt-1 pb-5">
<h1 class="header1 text-center">Categories</h1>
<div class="Categories" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center;">
    <?php
    foreach($categories as $row){
        echo "
    <div class='card' style='width: 18rem; margin: 10px;'>
            <img src='img/{$row['category_picture']}' id='img_card' class='m-4 rounded' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>{$row['category_name']}</h5>
            <p class='card-text'>Some quick </p>
            <a href='singlecategory.php?cateIdToEdit={$row['category_id']}' class='btn btn-primary'>Read More</a>
        </div>
    </div>
    ";
    }?>
</div>
</div>

<div class="bg-black pt-1 pb-5">
<h1 class="header1 text-center text-white">Recently Added Books</h1>
<div class="RecentlyAdded" style="display: flex; flex-wrap: wrap; justify-content: center;">
    <?php
    $bookCounter = 0;

    foreach($recentbooks as $row){
        echo "
            <div class='card' style='width: 18rem; margin: 10px;'>
                <img src='img/{$row['book_picture']}' id='img_card' class='m-4 rounded' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>{$row['book_title']}</h5>
                    <p class='card-text'>Price: {$row['book_price']}</p>
                    <p class='card-text'>Rating: {$row['book_rating']}</p>
                    <a href='singlebook.php?singlebookToShow={$row['book_id']}' class='btn btn-primary'>Read More</a>
                </div>
            </div>
        ";

        $bookCounter++;

        if ($bookCounter % 4 == 0) {
            echo "<div style='width: 100%;'></div>"; // Line break
        }
    }
    ?>
</div>
</div>

<div class="pt-1 pb-5">
<h1 class="header1 text-center">Featured Books</h1>
<div class="RecentlyAdded" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center;">
    <?php
    foreach($featured as $row){
        echo "
    <div class='card' style='width: 18rem; margin: 10px;'>
            <img src='img/{$row['book_picture']}' id='img_card' class='rounded m-4' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>{$row['book_title']}</h5>
            <p class='card-text'>Price: {$row['book_price']}</p>
            <p class='card-text'>Rating: {$row['book_rating']}</p>
            <a href='singlebook.php?singlebookToShow={$row['book_id']}' class='btn btn-primary'>Read More</a>
        </div>
    </div>
    ";
    }?>
</div>
</div>



