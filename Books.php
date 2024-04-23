<?php
Include "header.php";

$getallbooks = $conn->query("SELECT * FROM table_book");





?>

<div class="Categories">
    <?php
    foreach($getallbooks as $row){
        echo "
    <div class='card' style='width: 18rem;'>
            <img src='img/Siu.jpg' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>{$row['book_title']}</h5>
            <p class='card-text'>Some quick </p>
            <a href='singlebook.php?singlebookToShow={$row['book_id']}' class='btn btn-primary'>Read More</a>
        </div>
    </div>
    ";
    }?>
</div>

