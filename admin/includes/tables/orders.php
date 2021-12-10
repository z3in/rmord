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
                    <th>Payment method</th>
                    <th>change status to</th>
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

    const status_change = (id,stat) =>{
      fetch(`includes/app/transactions.php?request=update_order&id=${id}&stats=${stat}`)
    .then(data => data.json())
    .then(data => {
      if(data.response == 1){
        alert(data.message);
        fetchList()
      }
      })
    }
    const fetchList = () =>{
      fetch('includes/app/transactions.php?request=view_order')
    .then(data => data.json())
    .then(data => {
      if(data.response == 1){
          const container = document.querySelector("#table_verification");
          container.innerHTML = "";
          let params = (new URL(document.location)).searchParams;
          let filter = params.get('stat');
          const requestcontent = data.list.filter(item => item.status === filter).map(item =>{
              return `<tr>
                          <td>${item.date_created}</td>
                          <td>${item.payment_ref.replace("pay_","")}</td>
                          <td>${item.quantity}</td>
                          <td>${item.totalamount}</td>
                          <td>${item.status}</td>
                          <td>${item.payment_method}</td>
                          <td>${item.status === "pending" ? `<button class="btn btn-info" onclick="status_change(${item.ID},'delivery')">for delivery</button> &nbsp;<button class="btn btn-danger" onclick="status_change(${item.ID},'cancelled')">cancel</button>` : item.status === "delivery" ? `<button class="btn btn-success"  onclick="status_change(${item.ID},'completed')">complete order</button> &nbsp;<button class="btn btn-danger"  onclick="status_change(${item.ID},'cancelled')">cancel</button>` : null}</td>
                      </tr>`
          })

          requestcontent.forEach(el=>{
              container.innerHTML += el
          })

          if(requestcontent.length < 1){
            container.innerHTML +=`<tr>
                          <td colspan="7" style="text-align:center">No Orders Found</td>`
          }
      }
    })
    }


    fetchList()

   </script>


</div>

