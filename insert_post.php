<?php
    require_once("head.php");
    require_once("layout/header.php");

    if ($user === null) {
        session_destroy();
        show_error('Datubāzē Tevis nav');
    }

?>

<div class="row">
    <div class="col-6 offset-3">
        <form action="/models/article.php" method="post" enctype="multipart/form-data">
            <div class="custom-file">
                <label class="custom-file-label" for="customFile">Featured image</label>
                <input type="file" name="article_image" class="custom-file-input" id="customFile">
            </div>
            <div class="form-group">
                <label>Article title</label>
                <input type="text" name="article_title" class="form-control" />
            </div>
            <div class="form-group">
                <label>Article content</label>
                <textarea name="article_content" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" />
            </div>
        </form>
    </div>
</div>

<?php
    require_once("layout/footer.php");
?>
