<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel - Coalition Product Tes</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
</head>
<body>

<div class="row">

    <div class="col-sm-6 col-sm-offset-3">
        <h1>Laravel - Coalition Product Test</h1>
        <form name="product">
            <div class="form-group">
                <label >Product Name</label>
                <input type="text" class="form-control" id="product">
            </div>
            <div class="form-group">
                <label for="pwd">Quantity in Stock</label>
                <input type="text" class="form-control" id="qty" value="0">
            </div>
            <div class="form-group">
                <label for="pwd">Price per Item</label>
                <input type="text" class="form-control" id="price" value="0.00">
            </div>

            <button type="button" class="btn btn-default save">Save</button>
            <button type="button" class="btn btn-default update hide">Update</button>
        </form>
    </div>
    <div class="col-sm-6 col-sm-offset-3">
        <table class="table table-striped productTable">
            <thead>
            <tr>

                <th>Product</th>
                <th>Qty</th>
                <th>Datetime submitted</th>
                <th>Total value number</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>

                <td colspan="3">Grand Total</td>
                <td id="grandTotal">0.00</td>
                <td></td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<meta name="_token" content="{!! csrf_token() !!}" />
<script type="application/javascript" src="/js/product.js"></script>
</body>
</html>
