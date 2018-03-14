<!--Footer-->
<footer class="page-footer font-small pt-4 mt-4">
    <!--Copyright-->
    <div class="py-3 text-center" id="footer">
        © 2018
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->
</body>  
</html>  

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      var dataTable = $('#item_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/fetch_user'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
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
                     url:"<?php echo base_url() . 'admin/user_action'?>",  
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