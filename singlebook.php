<?php
Include "header.php";

if(isset($_GET['singlebookToShow'])){
    $getbook = $_GET['singlebookToShow'];
    $pullbook = $user->singlebookToShow($getbook);


    // Check if $pullbook is not null
    if ($pullbook) {
        ?>
        <div class="books">
            <?php
            foreach($pullbook as $row){
                echo "
                    <div class='card' style='width: 18rem;'>
                        <img src='img/{$row['book_picture']}' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['book_title']}</h5>
                            <p class='card-text'>{$row['book_desc']}</p>
                        </div>
                    </div>
                ";
            }
            ?>
        </div>
        <?php
    } else {
        // Handle the case where no book is found
        echo "No book found.";
    }
}
?>
