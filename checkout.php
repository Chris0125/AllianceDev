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

    <title>Checkout</title>

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
body{ margin-top:20px; }
	</style>
</head>

<body>

    <?php
include 'navbar.php';
?>

    <!-- Page Content -->
    <div class="container">
	<div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="#step-1">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">Shipping Address</p>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Payment Method</p>
                </a></li>
                <li class="disabled"><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">Review Items and Shipping</p>
                </a></li>
            </ul>
        </div>
	</div>
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1> STEP 1</h1>
				<div class="row">
				<shipform>
					
				</shipform>
				</div>
                <button id="activate-step-2" class="btn btn-primary btn-lg">Next Step</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12 well">
                <h1 class="text-center"> STEP 2</h1>
				<div class="row">
				<pay>
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
							<form role="form" action="register.php" method="POST">
								<h2>Please enter your credit card info.<h2>
								<hr class="colorgraph">
										<div class="form-group">
										Type: <select class="selectpicker">
										  <option>Visa</option>
										  <option>Mastercard</option>
										  <option>Am. Express</option>
										  <option>Discover</option>
										</select>
								</div>
								
								<div class="form-group">
									<input type="CC" name="CC" id="CC" class="form-control input-lg" placeholder="Credit Card Number" tabindex="4">
								</div>
								
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="CCV" id="CCV" class="form-control input-lg" placeholder="CCV" tabindex="1">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="Zip" id="Zip" class="form-control input-lg" placeholder="Zip Code" tabindex="1">
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
										Month: <select class="selectpicker">
										  <option>01</option>
										  <option>02</option>
										  <option>03</option>
										  <option>04</option>
										  <option>05</option>
										  <option>06</option>
										  <option>07</option>
										  <option>08</option>
										  <option>09</option>
										  <option>10</option>
										  <option>11</option>
										  <option>12</option>
										</select>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
										Year: <select class="selectpicker">
										  <option>2016</option>
										  <option>2017</option>
										  <option>2018</option>
										  <option>2019</option>
										  <option>2020</option>
										  <option>2021</option>
										  <option>2022</option>
										  <option>2023</option>
										  <option>2024</option>
										  <option>2025</option>
										  <option>2026</option>
										  <option>2027</option>
										</select>
									</div>
								</div>
								
							</form>
						</div>
					</div>
				</pay>
				</div>
				<button id="activate-step-3" class="btn btn-primary btn-lg">Review and Confirm Order</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well">
                <h1 class="text-center"> STEP 3</h1>
				<div class="row">
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
				<confirmation>
					mmmmm
				</confirmation>
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
                        <td></td>
						</a>
                        <td>
                        <a href="order.php"><button type="submit" class="btn btn-success" >
                            Place Order <span class="glyphicon glyphicon-play"></span>
                        </button></a></td>
                    </tr>
                </tfoot>
				
				</table>
				</div>
            </div>
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
	$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        $(this).remove();
    })  


	$('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        $(this).remove();
    }) 
	


			var user_id = eval(<?php echo $_SESSION['userSession']; ?>);
			console.log(user_id);
			if (user_id == null)
			{
				// Start an empty html string
					item_box = "";
						
						item_box = item_box + '<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"><form role="form" method="POST"><h2>Verify your shipping address</h2>';
						item_box = item_box + '<hr class="colorgraph"> <div class="row"> <div class="col-xs-12 col-sm-6 col-md-6"> <div class="form-group">';
						item_box = item_box + '<input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">';
						item_box = item_box + '</div> </div> <div class="col-xs-12 col-sm-6 col-md-6"> <div class="form-group">';
						item_box = item_box + '<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2"</div></div> </div>';
						item_box = item_box + '<div class="form-group"><input type="address1" name="address1" id="address1" class="form-control input-lg" placeholder="Address 1" tabindex="4"></div>';
						item_box = item_box + '<div class="form-group"><input type="address2" name="address2" id="address2" class="form-control input-lg" placeholder="Address 2" tabindex="4"></div>';
						item_box = item_box + '<div class="form-group"><input type="address3" name="address3" id="address3" class="form-control input-lg" placeholder="Address 3" tabindex="4"></div>';
						item_box = item_box + '<div class="form-group"><input type="city" name="city" id="city" class="form-control input-lg" placeholder="City" tabindex="4"></div>';
						item_box = item_box + '<div class="form-group"><input type="state" name="state" id="state" class="form-control input-lg" placeholder="State" tabindex="4"></div>';

						
						
						item_box = item_box + '<div class="row"> <div class="col-xs-12 col-sm-6 col-md-6"> <div class="form-group">'; 
						item_box = item_box + '<input type="country" name="country" id="country" class="form-control input-lg" placeholder="Country" tabindex="5"> </div>';
						item_box = item_box + '</div> <div class="col-xs-12 col-sm-6 col-md-6"> <div class="form-group">';
						item_box = item_box + '<input type="zip" name="zip" id="zip" class="form-control input-lg" placeholder="Zip Code" tabindex="6"> </div>';
						item_box = item_box + '</div> </div> </form> </div>';
					
					$('shipform').html(item_box);
			}	
			else
			{
				// Perform a get request to our api passing the page number and page size as parameters
				$.get("http://alliancedev.xyz/AllianceDev/api/api.php/users?filter=id,eq," + user_id)

				// The '.done' method fires when the get request completes
				.done(function(data)
				{
					// Append our new html to this pages only 'thead' tag
					//$('ship').html(item_box);

					// Pull the products out of our json object 
					var records = data.users.records;

					// Start an empty html string
					item_box = "";
					for (var i = 0; i < records.length; i++)
					{
						//Start a new row for each product and put the product id in a data-element
						
						
						item_box = item_box + '<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"><form role="form" method="POST"><h2>Verify your shipping address</h2>';
						item_box = item_box + '<hr class="colorgraph"> <div class="row"> <div class="col-xs-12 col-sm-6 col-md-6"> <div class="form-group">';
						item_box = item_box + '<input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" value="' + records[i][2] + '">';
						item_box = item_box + '</div> </div> <div class="col-xs-12 col-sm-6 col-md-6"> <div class="form-group">';
						item_box = item_box + '<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" value= "' + records[i][3] + '"</div></div> </div>';
						item_box = item_box + '<div class="form-group"><input type="address1" name="address1" id="address1" class="form-control input-lg" placeholder="Address 1" tabindex="4" value= "' + records[i][5] + '"></div>';
						item_box = item_box + '<div class="form-group"><input type="address2" name="address2" id="address2" class="form-control input-lg" placeholder="Address 2" tabindex="4" value= "' + records[i][6] + '"></div>';
						item_box = item_box + '<div class="form-group"><input type="address3" name="address3" id="address3" class="form-control input-lg" placeholder="Address 3" tabindex="4" value= "' + records[i][7] + '"></div>';
						item_box = item_box + '<div class="form-group"><input type="city" name="city" id="city" class="form-control input-lg" placeholder="City" tabindex="4" value= "' + records[i][8] + '"></div>';
						item_box = item_box + '<div class="form-group"><input type="state" name="state" id="state" class="form-control input-lg" placeholder="State" tabindex="4" value= "' + records[i][9] + '"></div>';

						
						
						item_box = item_box + '<div class="row"> <div class="col-xs-12 col-sm-6 col-md-6"> <div class="form-group">'; 
						item_box = item_box + '<input type="country" name="country" id="country" class="form-control input-lg" placeholder="Country" tabindex="5"value= "' + records[i][10] + '"> </div>';
						item_box = item_box + '</div> <div class="col-xs-12 col-sm-6 col-md-6"> <div class="form-group">';
						item_box = item_box + '<input type="zip" name="zip" id="zip" class="form-control input-lg" placeholder="Zip Code" tabindex="6"value= "' + records[i][11] + '"> </div>';
						item_box = item_box + '</div> </div> </form> </div>';
					}
					
					$('shipform').html(item_box);
				});
			}
			
			
			
			
			
			var cart = "<?php echo $_SESSION['cart'];?>";
			var subtotal = 0;

			items = cart.split(" ");
			for (var k = 0; k < items.length; k++)
			{
				items[k] = items[k].split(",");
				items[k][0] = items[k][0].replace(/\D/g,'');
				items[k][1] = items[k][1].replace(/\D/g,'');
			}
			var confirm_box = "";
			
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
						confirm_box = confirm_box + '<tr><td class="col-md-6"><div class="media">';
                        confirm_box = confirm_box + '<a class="thumbnail pull-left" href="#">';
						confirm_box = confirm_box + '<img class="media-object" src="'+ records[i][6] +'72.jpg"> </a><div class="media-body">';
                        confirm_box = confirm_box + '<h4 class="media-heading"><a href="http://alliancedev.xyz/AllianceDev/index1.php?id=' + records[i][0]+'">'+records[i][1]+'</a></h4>';
                        confirm_box = confirm_box + '<h5 class="media-heading"> by <a href="#">'+ records[i][4] +'</a></h5>';
                        confirm_box = confirm_box + '<span>Status: </span><span class="text-warning"><strong>Available</strong></span></div>';
                        confirm_box = confirm_box + '</div></td><td class="col-md-1" style="text-align: center">';
                        confirm_box = confirm_box + '<input type="text" class="form-control" id="amount" value="'+ items[j-1][0]+'"></td>';
                        confirm_box = confirm_box + '<td class="col-md-1 text-center"><strong>'+records[i][3] +'</strong></td>';
						var tot = parseFloat(records[i][3]) * parseInt(items[j-1][0]);
						subtotal = subtotal + tot;
						confirm_box = confirm_box + '<td class="col-md-1 text-center"><strong>'+ tot +'</strong></td><td class="col-md-1">';
                        confirm_box = confirm_box + '<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Remove';
                        confirm_box = confirm_box + '</button></td></tr>';
						//document.getElementsByTagName('confirmation')[0].innerHTML += confirm_box;
						$('confirmation').html(confirm_box);
						
						
					}	
				}).then(function(){
					document.getElementsByTagName('subtotal')[0].innerHTML = subtotal;
					var total = subtotal + (0.1 * subtotal)
					var shipping = Math.round((0.1 * subtotal)*100)/100;
					total = Math.round(total*100)/100;
					document.getElementsByTagName('ship')[0].innerHTML = shipping;
					document.getElementsByTagName('total')[0].innerHTML = total;
				});
				
			}

	
});


	
	(function($)
	{
		//https://esimakin.github.io/twbs-pagination/

		var guid = <?php echo "\"{$sid}\";"; ?>


		console.log(guid);


		// Set up some variables for our pagination
		var page = 1;
		var page_size = 10;
		var total_records = 0;
		var total_pages = 0;
		var rows = "";
		var item_box = "";

		/*
		products = {
			"columns":[
				0: "id"
				1: "category"
				2: "desc"
				3: "price"
				4: "img"
			],
			"records": [
				[
					0: "1",
					1: "tablet",
					2: "Fire Tablet, 7" Display, Wi-Fi, 8 GB - Includes Special Offers, Black",
					3: "49.99",
					4: "http://..."
				],
				[
				...
				]
			]
		}
		*/


			});		
			
	</script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>