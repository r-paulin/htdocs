<?php
require("..\head.php");
//Superglobalus var likt pa taisno funkcija
$art_title = $_POST['article_title'];
$art_image = $_FILES['article_image'];
$art_content = $_POST['article_content'];
$art_author = $_SESSION['user_id'];

// class Article { ??? who knows why  
    
//     public $art_title; 
//     public $art_image;
//     public $art_content;
    
//     function __construct($art_title, $art_image, $art_content) {
//         $this->article_title = $art_title;
//         $this->article_image = $art_image;
//         $this->article_content = $art_content;
//         $art_author = $email;
//     }
// }

// Pievienoju db lai dabutu funkcija atsauces uz datubazi, db nav pieejama funkcijas limeni
function save_article($db, $title, $image, $content, $user_id) {

    // esacpe stringi lai nebutu injekcijas, db_ tiek saglabats ieks datubazes
    $db_title = $db->escape_string($title);
    //$image neder jo vajag dabut linka nosaukumu taec leikam name gala name jo tas ir array
    $db_image = $db->escape_string($image['name']);
    $db_content = $db->escape_string($content);
    $db_author = $db->escape_string($user_id);
    
    
    // datus kurus sagalabasim db
    $sql = "INSERT INTO article (title, image, content, author) VALUES 
    ('" . $db_title . "', '" . $db_image . "', '" . $db_content . "', '" . "$db_author" . "')";
   
   //nosauta db datus
    if ($db->query($sql) === TRUE) {
        echo "<h1>Raksts beidzot ir saglabats</h1>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// ja nodefine funkciju vajag vinu izsaukt nodefinejot vertibas, sanemot no POST. Vertibas
// funkcijas liemni tas nav redzams
save_article($db, $art_title, $art_image, $art_content, $art_author);
?>