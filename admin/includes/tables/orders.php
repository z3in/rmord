<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">List of New Orders</h3>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Order ID</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Status</th>
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
  </div>
  <script type="text/javascript">
    const fetchList = () =>{
      fetch('includes/app/transactions.php?request=view_order')
    .then(data => data.json())
    .then(data => {
      if(data.response == 1){
          const container = document.querySelector("#table_verification");
          container.innerHTML = "";
          const requestcontent = data.list.map(item =>{
              return `<tr>
                          <td>${item.date_created}</td>
                          <td>${item.payment_ref.replace("pay_","")}</td>
                          <td>${item.quantity}</td>
                          <td>${item.totalamount}</td>
                          <td>${item.status}</td>
                      </tr>`
          })

          requestcontent.forEach(el=>{
              container.innerHTML += el
          })
      }
    })
    }


    fetchList()

   </script>


</div>

