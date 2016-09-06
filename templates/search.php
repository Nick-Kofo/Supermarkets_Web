<?php
  $searchKeyword = $_POST['search'];


  //prevent sql injection
  $searchKeyword = mysqli_real_escape_string($db, $searchKeyword);

  $query = "SELECT products.name as productName, products.description as productDescription, MIN(prices.price) as minProductPrice,
                  products.photo as productPhoto, prices.productId as productId
          FROM products inner join prices
          ON products.id = prices.productId
          WHERE products.name LIKE '%$searchKeyword%'
          GROUP BY prices.productId";
  $search_query = $db->query($query);

  ?>

  <div class="row" style="margin-top: 15px;">
      <?php while ($product = mysqli_fetch_assoc($search_query)) : ?>
          <?php
              $productId = $product['productId'];
              $productName = $product['productName'];
              $productDescription = $product['productDescription'];
              $minProductPrice = $product['minProductPrice'];
              $productPhoto = $product['productPhoto'];
          ?>
          <div class="col s12 m4 l3">
              <div class="card hoverable">
                  <div class="card-image">
                      <img width="250px" height="250px" src="<?php echo $productPhoto; ?>">
                  </div>
                  <div class="card-content">
                      <span class="activator grey-text text-darken-4"><?php echo $productName; ?><i class="material-icons right">more_vert</i></span>
                  </div>
                  <div class="card-action">
                      <i class="fa fa-eur fa-2x" aria-hidden="true"> <?php echo $minProductPrice; ?></i>
                      <a href="productInStores.php?productId=<?php echo $productId; ?>" class="right btn-floating btn-large waves-effect waves-light green accent-3">
                          <i class="material-icons">store</i></a>
                  </div>
                  <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Περιγραφή<i class="material-icons right">close</i></span>
                      <p><?php echo $productDescription; ?></p>
                  </div>
              </div>
          </div>
      <?php endwhile; ?>
  </div>
