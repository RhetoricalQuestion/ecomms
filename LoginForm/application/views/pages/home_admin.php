<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <form role="form" method="post" id="item_form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Item Name" name="prod_name" type="text" autofocus>
                            </div>
 
                            <div class="form-group">
                                <input class="form-control" placeholder="Item Code" name="prod_code" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="No. of Stocks" name="prod_stock" type="number" value="">
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input class="form-control" placeholder="Price" name="prod_price" type="number" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file" name="userfile" size="20" name="prod_image" id="prod_image"/>
                            </div>
 
                            <input class="btn btn-lg btn-success btn-block"   type="submit" value="Submit" name="submit" >
 
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="container box">  
                <h3 align="center">Items Database</h3><br />  
                <div class="table-responsive">  
                    <table id="item_data" class="table table-bordered table-striped">  
                        <thead>  
                            <tr>  
                                <th width="10%">Image</th>  
                                <th width="30%">Product Name</th>  
                                <th width="20%">Item Code</th>  
                                <th width="10%">Stocks</th>  
                                <th width="10%">Price</th>  
                                <th width="20%">Actions</th>  
                            </tr>  
                        </thead>  
                    </table>  
                </div>  
            </div>  
        </div>
    </div>
</div>

<script>  
 $(document).ready(function(){  
      var dataTable = $('#item_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{
               type: 'POST',
               url:"<?php echo base_url() . 'index.php/admin/fetch_user'; ?>",  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 5, 4],  
                     "orderable":false,  
                },  
           ],  
      });  
      $(document).on('submit', '#item_form', function(event){  
           event.preventDefault();  
          var prodName = $('#prod_name').val();  
          var prodCode = $('#prod_code').val();
          var prodStock = $('#prod_stock').val();  
          var prodPrice = $('#prod_price').val();  
          var extension = $('#prod_image').val().split('.').pop().toLowerCase();  
          
           if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
           {  
                alert("Invalid Image File");  
                $('#prod_image').val('');  
                return false;  
           }  
           if(prodName != '' && prodCode != '' && prodStock != '' && prodPrice != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url().'index.php/admin/user_action'?>",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          alert(data);  
                          $('#item_form')[0].reset();  
                          dataTable.ajax.reload();  
                     }  
                });  
           }  
           else  
           {  
                alert("Fields are Required");  
           }  
      });  
 });  
 </script>  