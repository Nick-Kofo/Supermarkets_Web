<?php
$query = "SELECT * FROM categories WHERE parent = 0";
$category_query = $db->query($query);
?>

<div class="row" style="margin-top: 15px;">
    <?php while ($category = mysqli_fetch_assoc($category_query)) : ?>
        <?php
            $categoryId = $category['id'];
            $categoryName = $category['name'];
            $categoryPhoto = $category['photo'];
        ?>
        <div class="col s12 m4 l3">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="category.php?categoryId=<?php echo $categoryId; ?>"><img width="250px" height="250px" src="<?php echo $categoryPhoto; ?>"></a>
                    <a href="category.php?categoryId=<?php echo $categoryId; ?>"><span class="card-title white-text shadow"><?php echo $categoryName; ?></span></a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
