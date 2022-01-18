<!DOCTYPE html>
<?php
include'includes/auth.php';
include'includes/connect.php';
?>
<html lang="en">
<head>
  <title>OROARS | Dashboard</title>
  <?php include'includes/head.php';?>
  <style>
      .form-select{
	  display: block;
    width: 100%;
    padding: 0.375rem 2.25rem 0.375rem 0.75rem;
    -moz-padding-start: calc(0.75rem - 3px);
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
	background-size: 16px 12px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
	}
	.form-select:focus {
    border-color: #86b7fe;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
	}
    /*---------------Pop up css------------*/ 
		#css-only-modals { 
		position:fixed; 
		pointer-events:none;
		left:0;
		top:0;
		right:0;
		bottom:0;
		z-index:10000000;
		text-align:center;
		white-space:nowrap;
		height:100%;
		}
		#css-only-modals:before {
		content:'';
		display:inline-block;
		height:100%;
		vertical-align:middle;
		margin-right:-.25em;
		}
		.css-only-modal-check {
		pointer-events:auto;
		display:none;
		}
		.css-only-modal-check:checked ~ .css-only-modal {
		opacity:1;
		pointer-events:auto;
		}
		.css-only-modal {
		width: 700px;
		background:#fff;
		z-index:1;
		display:inline-block;
		position:relative;
		pointer-events:auto;
		padding:25px;
		text-align:center;
		border-radius:4px;
		white-space:normal;
		display:inline-block;
		vertical-align:middle;
		opacity:0;
		pointer-events:none;
		max-width: 90%;
		}
		.css-only-modal h2 {
		text-align:center;
		}
		.css-only-modal p {
		text-align:center;
		}
		.btn-primary:hover {
		color:#fff;
		background-color:#999;
		border-color:#999;
		}
		.btn-primary {
		color:#fff;
		background-color:#777;
		border-color:#777;
		border-radius: 4px;
		padding: 6px 12px;
		}
		.css-only-modal-check:checked ~ #screen-shade {
		opacity:.5;
		pointer-events:none;
		}
		#modal1 { display: none; }
		#screen-shade {
		opacity:0;
		background:#000;
		position:absolute;
		left:0;
		right:0;
		top:0;
		bottom:0;
		pointer-events:none;
		transition:opacity .8s;
		}
		/*------------End pop up css------*/ 
      </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <?php include 'includes/leftnav.php';?>
  <?php include 'includes/topnav.php';?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/images/logo.png" alt="OROARS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Davids Grill</span>
    </a>

    <!-- Sidebar -->
  <?php include'includes/sidebaruser.php' ?>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <?php include 'includes/sidemenu.php'?>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Voucher</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Voucher Maintenance</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
  <div class="card-header">
    <h3 class="card-title">List of Vouchers</h3>
  </div>
    <div class="px-4 py-2">
      <label class="btn btn-primary" style="text-align:center;margin-bottom:0" for="modal1" id="btnAddNew"><i class="fa fa-plus"></i> Add New Voucher</label>
    </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Discount</th>
                    <th>Description</th>
                    <th>Percentage Discount</th>
                    <th>Discount Limit</th>
                  </tr>
                  </thead>
                  <tbody id="table_list">
                               
                  </tbody>

                </table>
  </div>
  <div id="css-only-modals"><input class="css-only-modal-check" id="modal1" type="checkbox" />
			<div class="css-only-modal">
			<label class="css-only-modal-btn btn btn-danger btn-lg" id="btnEscape" for="modal1" style="padding:5px 10px;float:right">X</label>
			<h2>Fill up details to add new Voucher</h2>
        <form style="text-align:left;margin-top:2em;overflow-y:auto">
            <div class="mb-3">
                <label for="input_discount" class="form-label">Discount Code</label>
                <input type="text" class="form-control" id="input_discount" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="input_description" class="form-label">Description</label>
                <input type="text" class="form-control" id="input_description">
            </div>
            <div class="mb-3">
                <label for="input_percentage" class="form-label">Discount in percentage(without the % sign)</label>
                <input type="text" class="form-control" id="input_percentage">
            </div>

            <div class="mb-3">
                <label for="input_limit" class="form-label">Discount Limit(in Php)</label>
                <input type="text" class="form-control" id="input_limit">
            </div>
        
            <button type="submit" id="btnNewSubmit" class="btn btn-primary">Submit</button>
            </form>
			</div>
			<div id="screen-shade"> </div>
			</div>
  <div class="card-footer">
  </div>
  <script type="text/javascript">
    const fetchList = () =>{
      fetch('includes/app/voucher.php?request=list')
    .then(data => data.json())
    .then(data => {
      if(data.response == 1){
          const container = document.querySelector("#table_list");
          container.innerHTML = "";
          if(data.hasOwnProperty("list")){
          const requestcontent = data.list.map(item =>{
              return `<tr>
                          <td>${item.ID}</td>
                          <td>${item.code}</td>
                          <td>${item.description}</td>
                          <td>${item.percentage}%</td>
                          <td>Php ${parseFloat(item.amount_limit).toFixed(2)}</td>
                          <td><button class="btn btn-secondary" onclick="editRow(${item.ID},'${item.code}','${item.description}','${item.percentage}','${item.amount_limit}')"> EDIT</button></td>
                      </tr>`
          })

          requestcontent.forEach(el=>{
              container.innerHTML += el
          })
          }
          if(!data.hasOwnProperty("list")){
            container.innerHTML = `<tr><td colspan="5" style="text-align:center">No result found</td></tr>`
          }
      }
    })
    }

    const selector = (name) =>{
      return document.querySelector(name)
    }

    var $table_id = 0;
    const editRow = (id,name,desc,percent,limit) =>{
      var checkbox = document.querySelector("#modal1");
      checkbox.checked = !checkbox.checked
      selector("#input_discount").value = name
      selector("#input_description").value = desc
      selector("#input_percentage").value = percent
      selector("#input_limit").value = limit
      $table_id = id;
    }

  const saveTable = (formData) =>{
      fetch('includes/app/voucher.php?request=save_voucher', {method: "POST",body:formData})
        .then(data => data.json())
        .then(data => {
          if(data.response == 1){
            if(data.hasOwnProperty("message")){
              clearFields()
              fetchList()
              return alert(data.message)
            }
          }
        })
    }

  const updateTable = (formData) => {
    formData.append("id",$table_id)
    fetch('includes/app/voucher.php?request=update_voucher', {method: "POST",body:formData})
        .then(data => data.json())
        .then(data => {
          if(data.response == 1){
            if(data.hasOwnProperty("message")){
              clearFields()
              fetchList()
              $table_id = 0;
              return alert(data.message)
            }
          }
    })
  }
   

    const clearFields = () =>{
      selector("#input_discount").value = ""
      selector("#input_description").value = ""
      selector("#input_percentage").value = ""
      selector("#input_limit").value = ""
    }

    fetchList()

    document.querySelector("#btnEscape").addEventListener("click",() => $table_id = 0)
    document.querySelector("#btnNewSubmit").addEventListener("click",(event)=>{
    event.preventDefault()
      
      var formData = new FormData()
      formData.append("code",selector("#input_discount").value)
      formData.append("descrip",selector("#input_description").value)
      formData.append("percent",selector("#input_percentage").value)
      formData.append("amt_limit",selector("#input_limit").value)
      !$table_id ? saveTable(formData) : updateTable(formData);
      
    })
   </script>


</div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include'includes/footer.php'?>
</body>
</html>