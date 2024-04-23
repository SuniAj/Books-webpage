<?php
Include "header.php";



if(isset($_GET['cateIdToEdit'])){

$getcate = $_GET['cateIdToEdit'];

$pullcate = $user->pullcategory($getcate);

}
?>

<div class="books">
    <?php
    
    foreach($pullcate as $row){
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