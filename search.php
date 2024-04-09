<?php
Include "header.php";

if (isset($_POST["submit_search"])) {

    $searchQuery = $_POST['search_query'];

    // Execute the query with the cleaned search query
    $results = $user->searchquery($searchQuery);

} else {
    echo "Form not submitted.";
}


?>
    <div class="books">
    <?php
    if (isset($results) && !empty($results)) {
        foreach ($results as $row) {
            echo "
                <div class='card' style='width: 28rem;'>
                <img src='img/{$row['book_picture']}' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$row['book_title']}</h5>
                        <a href='singlebook.php?singlebookToShow={$row['book_id']}' class='btn btn-primary'>Read More</a>
                    </div>
                </div>
            ";
        }
    } else {
        echo "
        <div>
        <p class'text-center'>No results found.<p/>
        <div/>
        ";
    }
    ?>
</div>

