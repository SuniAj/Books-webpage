<?php
Include "header.php";


if($user->checkloginstatus()){
    if(!$user->checkuserole(20)){
        $user->redirect('index.php');
    }
}
else{
    $user->redirect("editbook.php");
}

if(isset($_POST['search'])){

    $search_book = $_POST['search_book'];

    $booklist = searchquery($conn, $search_book);
    
}

?>

<h1 class="text-center m-1">Search For book</h1>
<div class="d-flex justify-content-center">
    <form method='post' class="d-flex">
        <input class="form-control me-2" type="search" name="search_book" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="search">Search</button>
    </form>
</div>

<div class="d-flex justify-content-center m-5">
    <?php
    if(isset($booklist)){
        foreach($booklist as $row){
            echo "<p class='m-3'>{$row['book_title']} <a class='m-1 btn btn-dark' href='editsinglebook.php?singlebooktoedit={$row['book_id']}'> Edit Book </a></p>";
        }
    }
    else {

        echo "Book not found!";
    
    }
    ?>
</div>