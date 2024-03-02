$(document).ready(function(){

    $('.increment-btn').click(function(e){
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        
        var value = parseInt(qty, 10);
           
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });
    $('.decrement-btn').click(function(e){
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        
        var value = parseInt(qty, 10);
           
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $('.addToCartBtn').click(function(e){
        e.preventDefault();
        
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "add"
            },
            success: function(response)
            {
                if(response == 201)
                {
                    alertify.success("Product added to card");
                }
                else if(response == "existing")
                {
                    alertify.success("Product already exist");
                }
                else if(response == 401)
                {
                    alertify.success("Login to continue");
                }
                else if(response == 501)
                {
                    alertify.success("Something went wrong");
                }
            }

        }); 
    });
});