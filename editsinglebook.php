<?php
Include "header.php";

if($user->checkloginstatus()){
    if(!$user->checkuserole(20)){
        $user->redirect('index.php');
    }
}


if(isset($_GET['booktoedit'])){
    $currentBook = $_GET['booktoedit'];
	$bookData = selectSingleBook($conn, $currentBook);
    
	
	}
	
	else {
		$errorMessage = "No book has been chosen.";
}

	if(isset($_POST['updatebook'])){
		if(isset($_POST['featuredcheckedit'])){
			$isFeatured = 1;
		  }
		  else {
			$isFeatured = 0;
		  }
		updateBook($conn, $_POST['edittitel'], $_POST['editagerecom'],  $_POST['editauthor'], $_POST['editillustrator'],  $_POST['editcategory'], $_POST['editgenre'], $_POST['editserie'], $_POST['editlanguage'], $_POST['editpubyear'], $_POST['editpublisher'], $_POST['editnumofpages'], $_POST['editprice'], $isFeatured, $_FILES['editcover']['name'], $bookData['book_id']);
}



?>



<div class="row">
        <div class="col-6">
        <form method="post" action="" enctype="multipart/form-data">
	    <h3>Edit Book</h3>
	    <label for="edittitel">Title:</label><br />
	    <input type="text" id="titel" placeholder="" class="form-control"  style="width: 300px;" value="<?php if(isset ($bookData['book_title'])) {echo $bookData['book_title'];}?>" name="edittitel" required="required"><br />
	    <label for="editdescription">desc:</label><br />
	    <textarea rows="7" cols="35" id="description" placeholder="" class="form-control" style="width: 300px;" name="description" required="required"><?php if(isset ($bookData['book_desc'])) {echo $bookData['book_desc'];}?></textarea><br />

	 

      <label for="editauthor">author:</label><br>
      <select name="editauthor" id="author" class="form-control" style="width: 220px;"  >
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



      
    <label for="editillustrator">Illustrator:</label><br>
      <select name="editillustrator" class="form-control" style="width: 220px;" id="illustrator">
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


 

    <label for="editagerecom">Age recommendation</label><br>
      <select name="editagerecom" class="form-control" style="width: 220px;" id="bagerecom">
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





    <label for="editcategory">Kategori</label><br>
      <select name="editcategory" class="form-control" style="width: 220px;" id="lang">
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


    <label for="editgenre">Genre</label><br>
      <select name="editgenre" class="form-control" style="width: 220px;" id="bgenre">
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


    <label for="editserie">Serie</label><br>
      <select name="editserie" class="form-control" style="width: 220px;" id="bseries">
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


 
    <label for="editlanguage">Språk</label><br>
      <select name="editlanguage" class="form-control" style="width: 220px;" id="language">
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


    <label for="editpubyear">Utgivningsår:</label><br />
	<input type="number" id="editpubyear" class="form-control" style="width: 220px;" value="<?php if(isset ($bookData['book_year'])) {echo $bookData['book_year'];}?>" placeholder="" name="editpubyear" required="required"><br />


    <label for="editpublisher">Förlag</label><br>
      <select name="editpublisher" class="form-control" style="width: 220px;" id="editpublisher">
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



    <label for="editnumofpages">Antal sidor:</label><br />
	<input type="number" id="editnumofpages" class="form-control" style="width: 150px;" value="<?php if(isset ($bookData['book_page'])) {echo $bookData['book_page'];}?>" placeholder="" name="editnumofpages" required="required"><br />

    <label for="editprice">Pris:</label><br />
	<input type="text" id="editprice" placeholder="" class="form-control" style="width: 150px;" value="<?php if(isset ($bookData['book_price'])) {echo $bookData['book_price'];}?>" name="editprice" required="required"><br />

  <label for="editrating">Betygsättning:</label><br />
	<input type="text" id="editrating" placeholder="" class="form-control" style="width: 150px;" value="<?php if(isset ($bookData['book_rating'])) {echo $bookData['book_rating'];}?>" name="editrating" required="required"><br />

  <input type="checkbox" style="width:25px; height: 25px;" id="featuredcheck" name="featuredcheck" value="<?php if(isset ($bookData['book_featured'] )) {echo $bookData['book_featured'];}?>" >
  <label for="featuredcheck">Featured</label><br><br>

    <label for="editcover">Pärmblad:</label><br />
	<input type="file" name="editcover" id="editcover" value="<?php if(isset ($bookData['book_picture'] )) {echo $bookData['book_picture'];}?>"><br><br>

    <input type="submit" class="btn btn-success" name="updatebook" value="Update">

</form>