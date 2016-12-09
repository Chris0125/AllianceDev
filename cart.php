<?php
include_once 'dbconnect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Item - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS --<link href="css/shop-item.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	ul.dropdown-cart{
    min-width:250px;
}
ul.dropdown-cart li .item{
    display:block;
    padding:3px 10px;
    margin: 3px 0;
}
ul.dropdown-cart li .item:hover{
    background-color:#f3f3f3;
}
ul.dropdown-cart li .item:after{
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}

ul.dropdown-cart li .item-left{
    float:left;
}
ul.dropdown-cart li .item-left img,
ul.dropdown-cart li .item-left span.item-info{
    float:left;
}
ul.dropdown-cart li .item-left span.item-info{
    margin-left:10px;   
}
ul.dropdown-cart li .item-left span.item-info span{
    display:block;
}
ul.dropdown-cart li .item-right{
    float:right;
}
ul.dropdown-cart li .item-right button{
    margin-top:14px;
}
div.price-cart{
	padding:12px
}
	</style>
</head>

<body>

<?php
include 'navbar.php';
?>
   	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h5>Subtotal<br>Estimated shipping</h5><h3>Total</h3></td>
                        <td class="text-right"><h5><strong>$<subtotal>0.00</subtotal><br>$<ship>0.00</ship></strong></h5><h3>$<total>0.00</total></h3></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <a href="index.php"><button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
						</a>
                        <td>
                        <a href="checkout.php"><button type="submit" class="btn btn-success" >
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script>
	$(function($) 
	{
		
			var cart = "<?php echo $_SESSION['cart'];?>";
			var subtotal = 0;

			items = cart.split(" ");
			for (var k = 0; k < items.length; k++)
			{
				items[k] = items[k].split(",");
				items[k][0] = items[k][0].replace(/\D/g,'');
				items[k][1] = items[k][1].replace(/\D/g,'');
			}
			var item_box = "";
			
			for (var j = 0; j < items.length; j++)
			{

				url_id = items[j][1];
				// Perform a get request to our api passing the page number and page size as parameters
				$.get("http://alliancedev.xyz/AllianceDev/api/api.php/products?filter=id,eq," + url_id)

				// The '.done' method fires when the get request completes
				.done(function(data)
				{
					// Pull the products out of our json object 
					var records = data.products.records;
					//console.log(records);
					for (var i = 0; i < records.length; i++)
					{
						//console.log(j);
						//Start a new row for each product and put the product id in a data-element
						item_box = item_box + '<tr><td class="col-md-6"><div class="media">';
                        item_box = item_box + '<a class="thumbnail pull-left" href="#">';
						item_box = item_box + '<img class="media-object" src="'+ records[i][6] +'72.jpg"> </a><div class="media-body">';
                        item_box = item_box + '<h4 class="media-heading"><a href="http://alliancedev.xyz/AllianceDev/index1.php?id=' + records[i][0]+'">'+records[i][1]+'</a></h4>';
                        item_box = item_box + '<h5 class="media-heading"> by <a href="#">'+ records[i][4] +'</a></h5>';
                        item_box = item_box + '<span>Status: </span><span class="text-warning"><strong>Available</strong></span></div>';
                        item_box = item_box + '</div></td><td class="col-md-1" style="text-align: center">';
                        item_box = item_box + '<input type="text" class="form-control" id="amount" value="'+ items[j-1][0]+'"></td>';
                        item_box = item_box + '<td class="col-md-1 text-center"><strong>'+records[i][3] +'</strong></td>';
						var tot = parseFloat(records[i][3]) * parseInt(items[j-1][0]);
						subtotal = subtotal + tot;
						item_box = item_box + '<td class="col-md-1 text-center"><strong>'+ tot +'</strong></td><td class="col-md-1">';
                        item_box = item_box + '<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Remove';
                        item_box = item_box + '</button></td></tr>';
						$('tbody').html(item_box);
						
					}
`				//the '.then' method fires after the '.done' method completes
				//
				}).then(function(){
					subtotal = Math.round(subtotal*100)/100;
					document.getElementsByTagName('subtotal')[0].innerHTML = subtotal;
					var total = subtotal + (0.1 * subtotal)
					var shipping = Math.round((0.1 * subtotal)*100)/100;
					total = Math.round(total*100)/100;
					document.getElementsByTagName('ship')[0].innerHTML = shipping;
					document.getElementsByTagName('total')[0].innerHTML = total;
				});
				
			}
			
 // End .done
		
		

		function guid()
		{
			function s4()
			{
				return Math.floor((1 + Math.random()) * 0x10000)
					.toString(16)
					.substring(1);
			}
			return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
				s4() + '-' + s4() + s4() + s4();
		}



	}(jQuery));

	/*	
	 */
	</script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>