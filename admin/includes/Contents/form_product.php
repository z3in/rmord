
    <form method='POST' action='functions/addproduct.php' enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputEmail1">Product Name</label>
          <input type="text" class="form-control" name='ProductName' placeholder="ProductName">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Category ID</label>
          <select class="form-control" name='CategoryID' id="CategoryID" required>
            <option value=""></option>

            <!--combo box function Select and Option-->
            <?php
            $datatable = "SELECT * FROM category";
            $result = $db->prepare($datatable);
            $result->execute();
            for($i=0; $row = $result->fetch(); $i++){
            ?>
              <option value="<?php echo $row['ID'];?>"><?php echo $row['CategoryName'];?></option>
            <?php  };?>
          </select>
        </div>
        <div class="form-group">
            <div class="subcat" id="subcat" name="subcat"></div>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Product Price</label>
          <input type="text" class="form-control" id="" name='ProductPrice' placeholder="ProductPrice">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">SRP</label>
          <input type="text" class="form-control" id="" name='SRP' placeholder="SRP">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Photo</label>
          <input type="file" class="form-control" id="Photo" name='Photo' placeholder="Photo">
        </div>
