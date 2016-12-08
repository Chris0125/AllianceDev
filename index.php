<?php
session_start();
if(!isset($_SESSION['cart']))
{
	$_SESSION['cart'] = "";
}
?>

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
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-2">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <a href="index.php?cat=fantasy" class="list-group-item">Fantasy</a>
                    <a href="index.php?cat=comic" class="list-group-item">Comics</a>
                    <a href="index.php?cat=textbook" class="list-group-item">Textbooks</a>
					<a href="index.php?cat=romance" class="list-group-item">Romance</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="./assets/1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="./assets/C.PNG" alt="">
                                </div>
                                
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
					<item>
					</item>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


	
	
</body>

<script>

(function($) {
    //https://esimakin.github.io/twbs-pagination/
	
	var guid = <?php echo"\"{$sid}\";";?>

	
	console.log(guid);

    var myWait;
    myWait = myWait || (function () {
        var waitDiv = $('<div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false"><div class="progress"> <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:98%"> LOADING... </div></div></div>');
        return {
            show: function() {
                waitDiv.modal();
            },
            hide: function () {
                waitDiv.modal('hide');
            },

        };
    })();


 

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


    function loadTableData(page, page_size,sort,order) {
	
		var url_id = getParameterByName('cat')
		
		if (url_id == null)
		{	
			var sort = typeof sort !== 'undefined' ?  sort.trim() : "id";
			var order = typeof order !== 'undefined' ?  ","+order : "";
		
			//myWait.show();
					
			// Perform a get request to our api passing the page number and page size as parameters
			console.log("http://alliancedev.xyz/AllianceDev/api/api.php/products?order="+sort+order+"&page=" + page + "," + page_size);
			$.get("http://alliancedev.xyz/AllianceDev/api/api.php/products?order="+sort+order+"&page=" + page + "," + page_size)

			// The '.done' method fires when the get request completes
			.done(function(data) {
			
			   //console.log(data);
			   
				// Append our new html to this pages only 'thead' tag
				$('item').html(item_box);

				// Pull the products out of our json object 
				var records = data.products.records;

				// Start an empty html string
				item_box = "";
				for (var i = 0; i < records.length; i++) 
				{
					//Start a new row for each product and put the product id in a data-element
					item_box = item_box + '<div class="col-sm-4 col-lg-4 col-md-4">';
					item_box = item_box + '<div class="thumbnail"><a href="http://alliancedev.xyz/AllianceDev/index1.php?id=' + records[i][0] +'"><img src="' + records[i][6] + '250_.jpg"  alt=""></a>';

					item_box = item_box + '<div class="caption"><h4 class="pull-right">$' + records[i][3]+'</h4>';
					item_box = item_box + '<h4><a href="http://alliancedev.xyz/AllianceDev/index1.php?id=' + records[i][0] +'">' + records[i][1].substr(0,40) +'...</a></h4>';
					
					item_box = item_box + '<p>' + records[i][2].substr(0,100) + '...</a>.</p></div><div class="ratings">';
					item_box = item_box + '<p class="pull-right">15 reviews</p><p>';
					item_box = item_box + '<span class="glyphicon glyphicon-star"></span>';
					item_box = item_box + '<span class="glyphicon glyphicon-star"></span>';
					item_box = item_box + '<span class="glyphicon glyphicon-star"></span>';
					item_box = item_box + '<span class="glyphicon glyphicon-star"></span>';
					item_box = item_box + '<span class="glyphicon glyphicon-star"></span></p></div></div></div>';
				}

				// At this point "rows" should have 'page_size' number of items in it,
				// so append all those rows to the body of the table.
				$('item').html(item_box);
				var scart = "" + '<?php echo $_SESSION["cart"]?>' + "";
                    //console.log(scart);
                    scart = scart.split(" ");

                    for (var i = 0; i < scart.length; i++)
                    {
                        scart[i] = scart[i].split(",");
                        //console.log(scart[0][1]);
                        scart[i][0] = scart[i][0].replace(/\D/g, '');
                        scart[i][1] = scart[i][1].replace(/\D/g, '');
                        //console.log(scart);
                    }

                    //console.log(scart);
                    for (var j = 0; j < scart.length; j++)
                    {
                        if (scart.length > 0)
                        {
                            var url_id = scart[j][1];
                            
                            $.get("http://alliancedev.xyz/AllianceDev/api/api.php/products?&filter=id,eq," + url_id)

                            // The '.done' method fires when the get request completes
                            .done(function(data)
                            {
                                // Pull the products out of our json object 
                                var records = data.products.records;

                                // Start an empty html string
                                cart_item = document.getElementsByTagName('cart')[0].innerHTML;
                                for (var i = 0; i < records.length; i++)
                                {
                                    cart_item = cart_item + '<li> <span class="item"> <span class="item-left"> <img src="' + records[i][6] + '45_.jpg" alt="" />';
                                    cart_item = cart_item + '<span class="item-info"> <span>' + records[i][1].substr(0, 15) + '...</span> <span>$ ' + records[i][3] + '</span> </span></span>';
                                    cart_item = cart_item + '<span class="item-right"><button class="btn btn-xs btn-danger pull-right">x</button></span></span></li>';
                                }

                                // At this point "rows" should have 'page_size' number of items in it,
                                // so append all those rows to the body of the table.
                                $('cart').html(cart_item);

                            });

                            var cart_counter = document.getElementsByTagName('cart-counter')[0].innerHTML;

                            cart_counter = parseInt(cart_counter) + 1;
                            console.log(cart_counter);
                            document.getElementsByTagName('cart-counter')[0].innerHTML = cart_counter;
                        }

                    }
				
				
			
				$('.fa-shopping-cart').click(function(){
					console.log($(this).closest('tr').data( "id" ));
					
					var item = [];
					$(this).closest('tr').find('td').each(function(){
						console.log($(this).text());
						item.push($(this).html());
					});
					console.log(item);
					addCartItem(item);
				})
		

			});
		}
		else
		{
			//console.log(url_id)
			
			var sort = typeof sort !== 'undefined' ?  sort.trim() : "id";
			var order = typeof order !== 'undefined' ?  ","+order : "";
		
			
					
			// Perform a get request to our api passing the page number and page size as parameters
			console.log("http://alliancedev.xyz/AllianceDev/api/api.php/products?filter=Categories,cs,"+url_id);
			$.get("http://alliancedev.xyz/AllianceDev/api/api.php/products?filter=Categories,cs,"+url_id)

			// The '.done' method fires when the get request completes
			.done(function(data) {
			
			   //console.log(data);
			   
				// Append our new html to this pages only 'thead' tag
				$('item').html(item_box);

				// Pull the products out of our json object 
				var records = data.products.records;

				// Start an empty html string
				item_box = "";
				for (var i = 0; i < records.length; i++) 
				{
					//Start a new row for each product and put the product id in a data-element
					item_box = item_box + '<div class="col-sm-4 col-lg-4 col-md-4">';
					item_box = item_box + '<div class="thumbnail"><a href="http://alliancedev.xyz/AllianceDev/index1.php?id=' + records[i][0] +'"><img src="' + records[i][6] + '250_.jpg"  alt=""></a>';

					item_box = item_box + '<div class="caption"><h4 class="pull-right">$' + records[i][3]+'</h4>';
					item_box = item_box + '<h4><a href="http://alliancedev.xyz/AllianceDev/index1.php?id=' + records[i][0] +'">' + records[i][1].substr(0,40) +'...</a></h4>';
					
					item_box = item_box + '<p>' + records[i][2].substr(0,100) + '...</a>.</p></div><div class="ratings">';
					item_box = item_box + '<p class="pull-right">15 reviews</p><p>';
					item_box = item_box + '<span class="glyphicon glyphicon-star"></span>';
					item_box = item_box + '<span class="glyphicon glyphicon-star"></span>';
					item_box = item_box + '<span class="glyphicon glyphicon-star"></span>';
					item_box = item_box + '<span class="glyphicon glyphicon-star"></span>';
					item_box = item_box + '<span class="glyphicon glyphicon-star"></span></p></div></div></div>';
				}
				$('item').html(item_box);
				
				var scart = "" + '<?php echo $_SESSION["cart"]?>' + "";
                    console.log(scart);
                    scart = scart.split(" ");

                    for (var i = 0; i < scart.length; i++)
                    {
                        scart[i] = scart[i].split(",");
                        //console.log(scart[0][1]);
                        scart[i][0] = scart[i][0].replace(/\D/g, '');
                        scart[i][1] = scart[i][1].replace(/\D/g, '');
                        //console.log(scart);
                    }

                    //console.log(scart);
                    for (var j = 0; j < scart.length; j++)
                    {
                        if (scart.length > 0)
                        {
                            var url_id = scart[j][1];
                            
                            $.get("http://alliancedev.xyz/AllianceDev/api/api.php/products?&filter=id,eq," + url_id)

                            // The '.done' method fires when the get request completes
                            .done(function(data)
                            {
                                // Pull the products out of our json object 
                                var records = data.products.records;

                                // Start an empty html string
                                cart_item = document.getElementsByTagName('cart')[0].innerHTML;
                                for (var i = 0; i < records.length; i++)
                                {
                                    cart_item = cart_item + '<li> <span class="item"> <span class="item-left"> <img src="' + records[i][6] + '45_.jpg" alt="" />';
                                    cart_item = cart_item + '<span class="item-info"> <span>' + records[i][1].substr(0, 15) + '...</span> <span>$ ' + records[i][3] + '</span> </span></span>';
                                    cart_item = cart_item + '<span class="item-right"><button class="btn btn-xs btn-danger pull-right">x</button></span></span></li>';
                                }

                                // At this point "rows" should have 'page_size' number of items in it,
                                // so append all those rows to the body of the table.
                                $('cart').html(cart_item);

                            });

                            var cart_counter = document.getElementsByTagName('cart-counter')[0].innerHTML;

                            cart_counter = parseInt(cart_counter) + 1;
                            console.log(cart_counter);
                            document.getElementsByTagName('cart-counter')[0].innerHTML = cart_counter;
                        }

                    }
				
				
		});
		}
	} //End function
	
	$('#updateCart').click(function(){
		$('.cart-item').each(function(){
			console.log($(this).find('.price').text());
			console.log($(this).find('.count').val());

		});
	});
    
    function getTotalPages(){
        $.get("./total_pages.txt")

        // The '.done' method fires when the get request completes
        .done(function(data) {

            var total_pages = data;
            loadTableData(1, 10);
            $('#pagination-demo').twbsPagination({
                totalPages: total_pages,
                visiblePages: 10,
                onPageClick: function (event, page) {
                    $('#page-content').text('Page ' + page);
                    loadTableData(page,10);
                }
            });
			
        });

    }
	
	$('#search-btn').click(function(event){
		event.preventDefault();
		var searchtxt = $('#search-keys').val();
		
        $.get("http://alliancedev.xyz/AllianceDev/api/api.php/products?filter=desc,cs,"+searchtxt)

        // The '.done' method fires when the get request completes
        .done(function(data) {
			//console.log(data);
			$('tbody').html('');
			
			  // Pull the column names out of our json object 
            var cols = data.products.columns;

            // Start an html string with a row tag
            item_box = "<tr>";
            for (var i = 0; i < cols.length; i++) {

                // Continuously append header tags to our row
                item_box += "<th nowrap> " + cols[i] +"</th>";
				
            }

            // Finish off our row with an empty header tag 
            item_box = item_box + "<th style=\"width: 36px;\"></th></tr>";

            // Append our new html to this pages only 'thead' tag
            $('thead').html(item_box);

            // Pull the products out of our json object 
            var records = data.products.records;

            // Start an empty html string
            rows = "";
            for (var i = 0; i < records.length; i++) {

                //Start a new row for each product and put the product id in a data-element
                rows = rows + "<tr data-id="+records[i][0]+" id=id"+records[i][0]+">";

                // Loop through each item for a product and append a table data tag to our row
                for (var j = 0; j < records[i].length; j++) {
                
                                
                    // This is the last item in the record set so it's the img url.
                    if(j == records[i].length-1){
                        var result = records[i][j] .split(' ');
                        var img = result[0].replace("~","25");
                        records[i][j] = "<img src="+img+">";
                    }
                    rows = rows + "<td>" + records[i][j] + "</td>";
                }
                rows = rows + '<td style="vertical-align:middle" nowrap><i class="fa fa-shopping-cart" aria-hidden="true"></i></td>';
                // Finish the row for a product
                rows = rows + "</tr>";
            }

            // At this point "rows" should have 'page_size' number of items in it,
            // so append all those rows to the body of the table.
            $('tbody').html(rows);
			
		});
		
	});
    
	function addCartItem(item){
		
		var row=''+
		'<div class="row cart-item" id="item-'+item[0]+'">'+
			'<div class="col-xs-2">'+ item[4] +
			'</div>'+
			'<div class="col-xs-3">'+
			'	<h4 class="product-name"><strong>'+item[1]+'</strong></h4>'+
			'</div>'+
			'<div class="col-xs-7">'+
			'	<div class="col-xs-4 text-right">'+
			'		<h6><strong><span class="price">$'+item[3]+'</span><span class="text-muted"> x </span></strong></h6>'+
			'	</div>'+
			'	<div class="col-xs-5">'+
			'		<input type="text" class="form-control input-sm count" value="1">'+
			'	</div>'+
			'	<div class="col-xs-2">'+
			'		<button type="button" class="btn btn-link btn-xs">'+
			'			<span class="glyphicon glyphicon-trash"> </span>'+
			'		</button>'+
			'	</div>'+
			'</div>'+
		'</div>'+
		'<hr>';
		
		var postData = {};
		postData['uid']=guid;
		postData['pid']=item[0];
		postData['count']=1;
		postData['description']=item[1];
		postData['price']=item[3];
		postData['time-added']=Math.floor(Date.now() / 1000);
		
		console.log(postData);
		var cartTotal = parseFloat($('#cart-total').text());
		if(isNaN(cartTotal))
			cartTotal = 0;

		cartTotal += parseFloat(item[3]);
		console.log(cartTotal);
		$('#cart-body').append(row);
		$('#cart-total').text(cartTotal)
		$.post("http://alliancedev.xyz/AllianceDev/api/api.php/shopping_cart/",postData);
	}

 
    
	 function guid() {
	  function s4() {
		return Math.floor((1 + Math.random()) * 0x10000)
		  .toString(16)
		  .substring(1);
	  }
	  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
		s4() + '-' + s4() + s4() + s4();
	}
	
    getTotalPages();
function getParameterByName(name, url)
    {
        if (!url)
        {
            url = window.location.href;
        }
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

}(jQuery));
</script>

</html>