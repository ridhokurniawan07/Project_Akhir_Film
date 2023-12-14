<?php 

    if (isset($_POST['search_text'])) {
        $keyword = $_POST['search_text'];
        header('location:search.php?keyword='.$keyword);
    }
?>

<!-- BEGIN | Header -->
<header class="ht-header">
    <div class="container">
        <?php include_once'./components/layer/navbar.php'; ?>

        <!-- top search form -->
        <form method="post">
            <div class="top-search">
                <select>
                    <option value="united">Movie</option>
                </select>
                <input type="text" name="search_text" value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>" placeholder="Search for a movie that you are looking for" />
            </div>
        </form>
    </div>
</header>
<!-- END | Header -->