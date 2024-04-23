<?php
Include "header.php";

if(isset($_GET['singlebookToShow'])){
    $getbook = $_GET['singlebookToShow'];
    $pullbook = singlebookToShow($conn, $getbook);


    // Check if $pullbook is not null
    if ($pullbook) {
        ?>
        <div class="books">
            <?php
            foreach($pullbook as $row){
                echo "
                    <div class='card text-left' style='width: 98rem;'>
                        <img src='img/{$row['book_picture']}' id='img_card' class='card-img-center m-4 rounded' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['book_title']}</h5>
                            <p class='card-text'>Description: {$row['book_desc']}</p>
                            <p class='card-text'>Year Published: {$row['book_year']}</p>
                            <p class='card-text'>Pages: {$row['book_page']}</p>
                            <p class='card-text'>Price: "?><?php echo '$',"{$row['book_price']}</p>
                            <p class='card-text'>Rating: {$row['book_rating']}</p>
                            <p class='card-text'>Author: {$row['author_name']}</p>
                            <p class='card-text'>Illustrator: {$row['illustrator_name']}</p>
                            <p class='card-text'>Category: {$row['category_name']}</p>
                            <p class='card-text'>Genre: {$row['genre_name']}</p>
                            <p class='card-text'>Series: {$row['series_name']}</p>
                            "?><?php if($user->checkuserole(20)){
                                echo "<a href='editsinglebook.php?booktoedit={$row['book_id']}' class='btn btn-primary'>Edit Book</a>";
                                echo "<form method='post' action='confirm_delete_book.php?booktodelete={$row['book_id']}'>

                                    <input type='submit' class='btn btn-danger mt-2' id='button' name='delete_book' value='Delete Book'>

                                </form>";
                            }"
                            
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
