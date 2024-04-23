<?php
include "header.php";

if($user->checkloginstatus()){
    if(!$user->checkuserole(20)){
        $user->redirect('index.php');
    }
}
else{
    $user->redirect("createbook.php");
}


if(isset($_POST['form-submit'])) {

	if(isset($_POST['featuredcheckedit'])){
		$isFeatured = 1;
		  }
		  else {
		$isFeatured = 0;
		  }
    createbook($conn, $_POST['titel'], $_POST['description'], $_POST['author'], $_POST['illustrator'], $_POST['bagerecom'], $_POST['bcategory'], $_POST['bgenre'], $_POST['bseries'], $_POST['language'], $_POST['pubyear'], $_POST['bpublisher'], $_POST['numofpages'], $_POST['price'], $_POST['brating'], $isFeatured);
    
}
?>


<div class="row">
        <div class="col-6">
        <form method="post" action="" enctype="multipart/form-data">
	    <h3>Edit Book</h3>
	    <label for="titel">Title:</label><br />
	    <input type="text" id="titel" placeholder="" class="form-control"  style="width: 300px;" value="<?php if(isset ($bookData['book_title'])) {echo $bookData['book_title'];}?>" name="titel" required="required"><br />
	    <label for="description">desc:</label><br />
	    <textarea rows="7" cols="35" id="description" placeholder="" class="form-control" style="width: 300px;" name="description" required="required"><?php if(isset ($bookData['book_desc'])) {echo $bookData['book_desc'];}?></textarea><br />

	 

      <label for="author">author:</label><br>
      <select name="author" id="author" class="form-control" style="width: 220px;"  >
      <?php
      if(isset ($bookData['author_name'])){
		echo "<option value='{$bookData['author_id']}'>Nuvarande: {$bookData['author_name']}</option>";
	}
	    $allAuthor = fetchAuthor($conn);
	    foreach($allAuthor as $row){
		echo "<option value='{$row['author_id']}'>{$row['author_name']}</option>";
	        }
		?>
    
    </select><br>



      
    <label for="illustrator">Illustrator:</label><br>
      <select name="illustrator" class="form-control" style="width: 220px;" id="illustrator">
      <?php
      if(isset ($bookData['illustrator_name'])){
		echo "<option value='{$bookData['illustrator_id']}'>Nuvarande: {$bookData['illustrator_name']}</option>";
	}
	    $allIllustrator = fetchIllustrator($conn);
	    foreach($allIllustrator as $row){
		echo "<option value='{$row['illustrator_id']}'>{$row['illustrator_name']}</option>";
	        }
		?>
    
    </select><br>


 

    <label for="bagerecom">Age recommendation</label><br>
      <select name="bagerecom" class="form-control" style="width: 220px;" id="bagerecom">
      <?php
      if(isset ($bookData['age_interval'])){
		echo "<option value='{$bookData['age_id']}'>Nuvarande: {$bookData['age_interval']}</option>";
	}
	    $allAgerecommendations = fetchAgerecommendations($conn);
	    foreach($allAgerecommendations as $row){
		echo "<option value='{$row['age_id']}'>{$row['age_interval']}</option>";
	        }
		?>
    
    </select><br>





    <label for="bcategory">Kategori</label><br>
      <select name="bcategory" class="form-control" style="width: 220px;" id="lang">
      <?php
      if(isset ($bookData['category_name'])){
		echo "<option value='{$bookData['category_id']}'>Nuvarande: {$bookData['category_name']}</option>";
	}
	    $allCategories = fetchCategories($conn);
	    foreach($allCategories as $row){
		echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
	        }
		?>
    
    </select><br>


    <label for="bgenre">Genre</label><br>
      <select name="bgenre" class="form-control" style="width: 220px;" id="bgenre">
      <?php
      if(isset ($bookData['genre_name'])){
		echo "<option value='{$bookData['genre_id']}'>Nuvarande: {$bookData['genre_name']}</option>";
	}
	    $allGenres = fetchGenres($conn);
	    foreach($allGenres as $row){
		echo "<option value='{$row['genre_id']}'>{$row['genre_name']}</option>";
	        }
		?>
    
    </select><br>


    <label for="bseries">Serie</label><br>
      <select name="bseries" class="form-control" style="width: 220px;" id="bseries">
      <?php
      if(isset ($bookData['series_name'])){
		echo "<option value='{$bookData['series_id']}'>Nuvarande: {$bookData['series_name']}</option>";
	}
	    $allSeries = fetchSeries($conn);
	    foreach($allSeries as $row){
		echo "<option value='{$row['series_id']}'>{$row['series_name']}</option>";
	        }
		?>
    
    </select><br>


 
    <label for="language">Språk</label><br>
      <select name="language" class="form-control" style="width: 220px;" id="language">
      <?php
      if(isset ($bookData['language_name'])){
		echo "<option value='{$bookData['language_id']}'>Nuvarande: {$bookData['language_name']}</option>";
	}
	    $allLanguages = fetchlanguages($conn);
	    foreach($allLanguages as $row){
		echo "<option value='{$row['language_id']}'>{$row['language_name']}</option>";
	        }
		?>
    
    </select><br>


    <label for="pubyear">Utgivningsår:</label><br />
	<input type="number" id="pubyear" class="form-control" style="width: 220px;" value="<?php if(isset ($bookData['book_year'])) {echo $bookData['book_year'];}?>" placeholder="" name="pubyear" required="required"><br />


    <label for="bpublisher">Förlag</label><br>
      <select name="bpublisher" class="form-control" style="width: 220px;" id="bpublisher">
      <?php
      if(isset ($bookData['publisher_name'])){
		echo "<option value='{$bookData['publisher_id']}'>Nuvarande: {$bookData['publisher_name']}</option>";
	}
	    $allPublisher = fetchPublisher($conn);
	    foreach($allPublisher as $row){
		echo "<option value='{$row['publisher_id']}'>{$row['publisher_name']}</option>";
	        }
		?>
    
    </select><br>



    <label for="numofpages">Antal sidor:</label><br />
	<input type="number" id="numofpages" class="form-control" style="width: 150px;" value="<?php if(isset ($bookData['book_page'])) {echo $bookData['book_page'];}?>" placeholder="" name="numofpages" required="required"><br />

    <label for="price">Pris:</label><br />
	<input type="text" id="price" placeholder="" class="form-control" style="width: 150px;" value="<?php if(isset ($bookData['book_price'])) {echo $bookData['book_price'];}?>" name="price" required="required"><br />

  <label for="brating">Betygsättning:</label><br />
	<input type="text" id="brating" placeholder="" class="form-control" style="width: 150px;" value="<?php if(isset ($bookData['book_rating'])) {echo $bookData['book_rating'];}?>" name="brating" required="required"><br />

  <input type="checkbox" style="width:25px; height: 25px;" id="featuredcheck" name="featuredcheck" value="<?php if(isset ($bookData['book_featured'] )) {echo $bookData['book_featured'];}?>" >
  <label for="featuredcheck">Featured</label><br><br>

    <label for="cover">Pärmblad:</label><br />
	<input type="file" name="cover" id="cover" value="<?php if(isset ($bookData['book_cover'] )) {echo $bookData['book_cover'];}?>"><br><br>

    <input type="submit" class="btn btn-success" name="form-submit" value="Update">

</form>