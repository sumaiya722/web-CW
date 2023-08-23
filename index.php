<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promocode Apply Project In PHP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2></h2>
        <div class="form-group">
            <label for="email">Total Price:</label>
            <input type="text" class="form-control" id="total_price" name="total_price" value="1000.00">
        </div>
        <div class="form-group">
            <label for="promo_code">Apply PromoCode:</label>
            <input type="text" class="form-control" id="coupon_code" placeholder="Apply PromoCode" name="coupon_code" ><b><span id="message" style="color:green;"></span></b>
        </div>
        <button id="apply" class="btn btn-default">Apply</button>
        <button id="edit" class="btn btn-default" style="display:none;">Edit</button>
    </div>
    <script>
        $("#apply").click(function(){
            if($('#promo_code').val()!='')
            {
                $.ajax({
                    type:"POST",
                    url:"process.php",
                    data:{
                        coupon_code:$('#coupon_code').val()
                    },
                    success:function(dataResult){
                        var dataResult=JSON.parse(dataResult);
                        if(dataResult.statusCode==200){
                            var after_apply=$('#total_price').val()-dataResult.value;
                            $('#total_price').val(after_apply);
                            $('#apply').hide();
                            $('#edit').show();
                            $('#message').html("Promocode Applied Successfully!");
                        }
                        else if(dataResult.statusCode==201){
                            $('#message').html("Invalid promocode!");
                        }
                    }
                });
            }
            else{
                $('#message').html("Promocode can not be Blank. Enter A Valid Promocode!");
            }
        });
        $("#edit").click(function(){
            $('#coupon_code').val("");
            $('#apply').show();
            $('#edit').hide();
            location.reload();
        });
    </script>
</body>
</html>