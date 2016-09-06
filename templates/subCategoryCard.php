<?php
$categoryId = $_GET['categoryId'];

//prevent sql injection
$categoryId= mysqli_real_escape_string($db, $categoryId);

$query = "SELECT * FROM categories WHERE parent = ".$categoryId;
$subCategory_query = $db->query($query);
?>

<div class="row" style="margin-top: 15px;">
    <?php while ($subCategory = mysqli_fetch_assoc($subCategory_query)) : ?>
        <?php
            $subCategoryParent = $subCategory['parent'];
            $subCategoryLevel = $subCategory['level'];
            $subCategoryName = $subCategory['name'];
            $subCategoryPhoto = $subCategory['photo'];
        ?>
        <div class="col s12 m4 l3">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="product.php?subCategoryParent=<?php echo $subCategoryParent?>&subCategoryLevel=<?php echo $subCategoryLevel?>">
                        <img width="250px" height="250px" src="<?php echo $subCategoryPhoto; ?>"></a>
                    <a href="product.php?subCategoryParent=<?php echo $subCategoryParent?>&subCategoryLevel=<?php echo $subCategoryLevel?>">
                        <span class="card-title white-text shadow"><?php echo $subCategoryName; ?></span></a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
