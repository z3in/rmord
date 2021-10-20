<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Client</h3>

    <div class="card-tools">
      <!--Declaration of New Button para sa adding ng new category-->
    </div>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Series</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>RepeatPassword</th>
                    <th>ID Picture</th>
                    <th>Billing</th>
                    <th>Button</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $datatable = "SELECT * FROM client";
                    $result = $db->prepare($datatable);
                    $result->execute();
                    for($i=0; $row = $result->fetch(); $i++){
                    ?>
                                <tr>
                                  <td><?php echo $row['Series'];?></td>
                                  <td><?php echo $row['Name'];?></td>
                                  <td><?php echo $row['Username'];?></td>
                                  <td><?php echo $row['Address'];?></td>
                                  <td><?php echo $row['ContactNo'];?></td>
                                  <td><?php echo $row['Email'];?></td>
                                  <td><?php echo $row['Password'];?></td>
                                  <td><?php echo $row['Repeatpassword'];?></td>
                                  <td><?php echo $row['IDPicture'];?></td>
                                  <td><?php echo $row['Billing'];?></td>
                                  <td>
                                    
                                  <a class="btn btn-success id" href='edit_client.php?id=<?php echo $row['ID'];?>'>Edit</a>
                                  <a href="functions/delclients.php?id=<?php echo $row['ID'];?>" class="btn btn-danger">Delete</a>
                                  </td>
                                </tr>

                    <?php
                    }

                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Series</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Billing</th>
                    <th>ID Picture</th>
                    <th>Button</th>
                  </tr>
                  </tfoot>
                </table>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
