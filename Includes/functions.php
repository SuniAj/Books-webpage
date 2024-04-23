<?php
include 'Includes/config.php';

function searchquery($conn, $searchQuery)
{
    $query = $conn->prepare(
        "SELECT *
        FROM table_book 
            INNER JOIN table_author ON table_book.author_fk = table_author.author_id
            INNER JOIN table_illustrator ON table_book.illustrator_fk = table_illustrator.illustrator_id
            INNER JOIN table_category ON table_book.category_fk = table_category.category_id
            INNER JOIN table_genre ON table_book.genre_fk = table_genre.genre_id
            INNER JOIN table_series ON table_book.series_fk = table_series.series_id
            INNER JOIN table_publisher ON table_book.publisher_fk = table_publisher.publisher_id
            INNER JOIN table_language ON table_book.lang_fk = table_language.language_id
            INNER JOIN table_age ON table_book.age_fk = table_age.age_id
        WHERE
            book_title LIKE CONCAT('%', :search_query, '%')
            OR book_desc LIKE CONCAT('%', :search_query, '%')
            OR book_year = :search_query
            OR book_page = :search_query
            OR book_price = :search_query
            OR author_name LIKE CONCAT('%', :search_query, '%')
            OR illustrator_name LIKE CONCAT('%', :search_query, '%')
            OR category_name LIKE CONCAT('%', :search_query, '%')
            OR genre_name LIKE CONCAT('%', :search_query, '%')
            OR series_name LIKE CONCAT('%', :search_query, '%')
            OR publisher_name LIKE CONCAT('%', :search_query, '%')
            OR language_name LIKE CONCAT('%', :search_query, '%')
            OR age_interval = :search_query
    ");
    
    $query->bindValue(':search_query', $searchQuery, PDO::PARAM_STR);
    $query->execute();
    

    $errorInfo = $query->errorInfo();

    if ($errorInfo[0] !== '00000') {
        echo "Error Code: " . $errorInfo[0] . "<br>";
        echo "Error Message: " . $errorInfo[2] . "<br>";
    }

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

    function pullcategory($conn, $getcate){

        $getcateinfo = $conn->prepare("SELECT * FROM table_book WHERE category_fk = :cate_id");

        $getcateinfo->bindParam("cate_id", $getcate, PDO::PARAM_STR);
        $getcateinfo->execute();

        $gettingcateinfo = $getcateinfo->fetchAll(PDO::FETCH_ASSOC);
        return $gettingcateinfo;
    }

    function singlebookToShow($conn, $getbook){

        $getbookinfo = $conn->prepare(
            "SELECT * 
            FROM table_book 
            INNER JOIN table_author ON table_book.author_fk = table_author.author_id
            INNER JOIN table_illustrator ON table_book.illustrator_fk = table_illustrator.illustrator_id
            INNER JOIN table_category ON table_book.category_fk = table_category.category_id
            INNER JOIN table_genre ON table_book.genre_fk = table_genre.genre_id
            INNER JOIN table_series ON table_book.series_fk = table_series.series_id
            INNER JOIN table_publisher ON table_book.publisher_fk = table_publisher.publisher_id
            INNER JOIN table_language ON table_book.lang_fk = table_language.language_id
            INNER JOIN table_age ON table_book.age_fk = table_age.age_id
            INNER JOIN table_bookstatus ON table_book.bookstatus_fk = table_bookstatus.bookstatus_id
            WHERE book_id = :book_id");

        $getbookinfo->bindParam("book_id", $getbook, PDO::PARAM_STR);
        $getbookinfo->execute();

        $gettingbookinfo = $getbookinfo->fetchAll(PDO::FETCH_ASSOC);
        return $gettingbookinfo;
    }

    function fetchAuthor($conn){
        $fetchAuthor = $conn->prepare("SELECT * FROM table_author");
        $fetchAuthor->execute();
        return $fetchAuthor;
    }
    function fetchIllustrator($conn){
        $fetchIllustrator = $conn->prepare("SELECT * FROM table_illustrator");
        $fetchIllustrator->execute();
        return $fetchIllustrator;
    }
    function fetchAgerecommendations($conn){
        $fetchAgerecommendations = $conn->prepare("SELECT * FROM table_age");
        $fetchAgerecommendations->execute();
        return $fetchAgerecommendations;
    }
    function fetchCategories($conn){
        $fetchCategories = $conn->prepare("SELECT * FROM table_category");
        $fetchCategories->execute();
        return $fetchCategories;
    }
    function fetchGenres($conn){
        $fetchGenres = $conn->prepare("SELECT * FROM table_genre");
        $fetchGenres->execute();
        return $fetchGenres;
    }
    function fetchSeries($conn){
        $fetchSeries = $conn->prepare("SELECT * FROM table_series");
        $fetchSeries->execute();
        return $fetchSeries;
    }
    function fetchlanguages($conn){
        $fetchlanguages = $conn->prepare("SELECT * FROM table_language");
        $fetchlanguages->execute();
        return $fetchlanguages;
    }
    function fetchPublisher($conn){
        $fetchPublisher = $conn->prepare("SELECT * FROM table_publisher");
        $fetchPublisher->execute();
        return $fetchPublisher;
    }

    function selectSingleBook($conn, $currentbook){
        $selectSingleBook = $conn->prepare("SELECT * FROM table_book WHERE book_id = :currentbbook");
        $selectSingleBook->bindParam(':currentbbook', $currentbook, PDO::PARAM_INT);
        $selectSingleBook->execute();
        return $selectSingleBook->fetch(PDO::FETCH_ASSOC);           
            
    }
    
    function updateBook($conn, $title, $agerecom, $author, $illustrator, $category, $genre, $serie, $language, $pubyear, $publisher, $numofpages, $price, $isFeatured, $cover, $book_id) {
        // Prepare the UPDATE query
        $updateQuery = $conn->prepare("UPDATE table_book SET 
        book_title = :title, 
        age_fk = :agerecom, 
        author_fk = :author, 
        illustrator_fk = :illustrator, 
        category_fk = :category, 
        genre_fk = :genre, 
        series_fk = :serie, 
        lang_fk = :language, 
        book_year = :pubyear, 
        publisher_fk = :publisher, 
        book_page = :numofpages, 
        book_price = :price, 
        book_featured = :isFeatured, 
        book_picture = :cover 
        WHERE book_id = :book_id");
    
        // Bind parameters
        $updateQuery->bindParam(':title', $title, PDO::PARAM_STR);
        $updateQuery->bindParam(':agerecom', $agerecom, PDO::PARAM_INT);
        $updateQuery->bindParam(':author', $author, PDO::PARAM_INT);
        $updateQuery->bindParam(':illustrator', $illustrator, PDO::PARAM_INT);
        $updateQuery->bindParam(':category', $category, PDO::PARAM_INT);
        $updateQuery->bindParam(':genre', $genre, PDO::PARAM_INT);
        $updateQuery->bindParam(':serie', $serie, PDO::PARAM_INT);
        $updateQuery->bindParam(':language', $language, PDO::PARAM_INT);
        $updateQuery->bindParam(':pubyear', $pubyear, PDO::PARAM_INT);
        $updateQuery->bindParam(':publisher', $publisher, PDO::PARAM_INT);
        $updateQuery->bindParam(':numofpages', $numofpages, PDO::PARAM_INT);
        $updateQuery->bindParam(':price', $price, PDO::PARAM_INT);
        $updateQuery->bindParam(':isFeatured', $isFeatured, PDO::PARAM_INT);
        $updateQuery->bindParam(':cover', $cover, PDO::PARAM_INT);
        $updateQuery->bindParam(':book_id', $book_id, PDO::PARAM_INT);
    
        // Execute the query
        $updateQuery->execute();
    }

    function createbook($conn, $title, $description, $author, $illustrator, $age_recommendation, $category, $genre, $series, $language, $pub_year, $publisher, $num_of_pages, $price, $rating, $is_featured) {

        $stmt = $conn->prepare("INSERT INTO table_book 
            (book_title, book_desc, age_fk, author_fk, illustrator_fk, category_fk, genre_fk, series_fk, lang_fk, book_year, publisher_fk, book_page, book_price, book_rating, book_featured, book_picture) 
            VALUES 
            (:title, :bookdesc, :agerecom, :author, :illustrator, :category, :genre, :serie, :language, :pubyear, :publisher, :numofpages, :price, :rating, :isFeatured, '100.jpg')");
    
        // Bind parameters
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':bookdesc', $description, PDO::PARAM_STR);
        $stmt->bindParam(':agerecom', $age_recommendation, PDO::PARAM_INT);
        $stmt->bindParam(':author', $author, PDO::PARAM_INT);
        $stmt->bindParam(':illustrator', $illustrator, PDO::PARAM_INT);
        $stmt->bindParam(':category', $category, PDO::PARAM_INT);
        $stmt->bindParam(':genre', $genre, PDO::PARAM_INT);
        $stmt->bindParam(':serie', $series, PDO::PARAM_INT);
        $stmt->bindParam(':language', $language, PDO::PARAM_INT);
        $stmt->bindParam(':pubyear', $pub_year, PDO::PARAM_INT);
        $stmt->bindParam(':publisher', $publisher, PDO::PARAM_INT);
        $stmt->bindParam(':numofpages', $num_of_pages, PDO::PARAM_INT);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
        $stmt->bindParam(':isFeatured', $is_featured, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            echo "Book created successfully.";
        } else {
            echo "Error creating book: " . $stmt->errorInfo()[2];
        }
    }
    
    
    function deleteBook($conn, $booktodelete){

        $deletebook = $conn->prepare("DELETE FROM table_book WHERE book_id = :book_idd");
        $deletebook->bindParam(':book_idd', $booktodelete, PDO::PARAM_INT);
        if($deletebook->execute()){
            return "success";
        }
        else{
            $this->errorMessage = "something went wrong";
            return $this->errorMessage;
        }
    }
?>