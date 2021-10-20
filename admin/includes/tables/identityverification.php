<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Identity Verification</h3>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Fullname</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>ID</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="table_verification">
                                <!-- <tr>

                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>
                                    <a class="btn btn-success id" href='#'>Verify</a>
                                    <a href="#" class="btn btn-danger">Denied</a>
                                  </td>
                                </tr> -->
                  </tbody>

                </table>
  </div>
  <div class="card-footer">
    Footer
  </div>
  <script>

    fetch('includes/app/identity_verification.php?request=list')
    .then(data => data.json())
    .then(data => {
      if(data.response == 1){
          const container = document.querySelector("#table_verification");
          console.log('test')
          const requestcontent = data.result.map(item =>{
              return `<tr>
                          <td>${item.name}</td>
                          <td>${item.contact}</td>
                          <td>${item.email}</td>
                          <td><a href="/rmord/app/upload/${item.photo_path}" target="_blank">VIEW</a></td>
                          <td>${item.date_created}</td>
                          <td>${item.status ? "active" : "pending"}</td>
                          <td><button class="btn btn-sm btn-success"><i class="fas fa-check"></i> approve </button> <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i> disapprove </button></td>
                      </tr>`
          })

          requestcontent.forEach(el=>{
              container.innerHTML += el
          })
      }
    })

   </script>
</div>

