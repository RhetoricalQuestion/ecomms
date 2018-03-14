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
                <h3 align="center">Table</h3><br />  
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