$(document).ready(function(){
    function loadProduct() {
        $.ajax({

            type: "GET",
            url: '/api/product',
            dataType: 'json',
            success: function (data) {
                showProduct(data.product);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }
    loadProduct();

    $('.save').click(function(){
        var product= $('#product').val();
        $.ajax({

            type: "POST",
            url: '/api/product',
            data:{product:product, qty:$('#qty').val(), price: $('#price').val()},
            dataType: 'json',
            success: function (data) {
                loadProduct();
                clear();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('.productTable tbody').delegate('.btn-edit', 'click', function(){
        var productId= $(this).parent().parent().attr('id');
        window.productId = productId;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({

            type: "GET",
            url: '/api/product/'+productId,
            dataType: 'json',
            success: function (data) {
                $('#product').val(data.product.product);
                $('#qty').val(data.product.qty);
                $('#price').val(data.product.price);
                $('button.save').addClass('hide');
                $('button.update').removeClass('hide');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $('.productTable tbody').delegate('.btn-delete', 'click', function(){
        var productId= $(this).parent().parent().attr('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({

            type: "DELETE",
            url: '/api/product/'+productId,
            dataType: 'json',
            success: function (data) {
                loadProduct();

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $('.update').click(function(){
        var product= $('#product').val();
        $.ajax({

            type: "POST",
            url: '/api/product/'+window.productId,
            data:{product:product, qty:$('#qty').val(), price: $('#price').val()},
            dataType: 'json',
            success: function (data) {
                loadProduct();
                clear();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



    function clear() {
        $('#product').val('');
        $('#qty').val(0);
        $('#price').val(0.00);
        $('button.update').addClass('hide');
        $('button.save').removeClass('hide');
    }

    function showProduct(data) {
        var grandTotal =0;
        var str ='';
        var dateSubmitted;
        data.forEach(function(item){
            grandTotal+=parseFloat(item.price*item.qty);
            dateSubmitted = new Date(item.id * 1000).toString();

            str+='<tr id="'+item.id+'"><td>'+item.product+'</td><td>'+item.qty+'</td>' +
                '<td>'+dateSubmitted+'</td><td>'+parseFloat(item.price*item.qty)+'</td>' +
                '<td><button type="button" class="btn btn-primary btn-sm btn-edit">Edit</button>'+
                '<button type="button" class="btn btn-secondary btn-sm btn-delete">Delete</button></td></tr>'
            ;
        });
        $('.productTable tbody').html(str);
        $('.productTable tfoot #grandTotal').text(grandTotal);
    }
});