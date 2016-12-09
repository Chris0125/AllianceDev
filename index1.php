<?php
//Item page 
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

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-2">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <a href="#" class="list-group-item active">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>
			<item>
            </item>
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
<script>
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


        function loadTableData(page, page_size, sort, order)
        {

            var sort = typeof sort !== 'undefined' ? sort.trim() : "id";
            var order = typeof order !== 'undefined' ? "," + order : "";

            var url_id = getParameterByName('id');

            // Perform a get request to our api passing the page number and page size as parameters
            console.log("http://alliancedev.xyz/AllianceDev/api/api.php/products?order=" + sort + order + "&page=" + page + "," + page_size);
            $.get("http://alliancedev.xyz/AllianceDev/api/api.php/products?order=" + sort + order + "&page=" + page + "," + page_size + "&filter=id,eq," + url_id)

            // The '.done' method fires when the get request completes
            .done(function(data)
            {

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
                    item_box = item_box + '<div class="col-md-8"><div class="thumbnail">';
                    item_box = item_box + '&nbsp;\n\n\n\n&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-responsive" src="' + records[i][6] + '250_.jpg" alt=""><div class="caption-full">';



                    item_box = item_box + '<div><h4><a href="http://alliancedev.xyz/AllianceDev/index1.php?id=';
                    item_box = item_box + records[i][0] + '">' + records[i][1] + '</a><div class="price-cart">$' + records[i][3];
                    item_box = item_box + '<span class="pull-right"><a onclick="AddCart()" class="add-cart btn btn-success">Add To Cart</a>';
                    item_box = item_box + '</span>' + '</div></h4></div> <p>' + records[i][2] + '</p></div><comments></comments>';

                }
                $('item').html(item_box);

				//Populate the comment sections
                $.get("http://alliancedev.xyz/AllianceDev/api/api.php/comments?&filter=item_id,eq," + url_id)

                // The '.done' method fires when the get request completes
                .done(function(comment_data)
                {
					//extract the record
                    var records = comment_data.comments.records;
                    var comment_box = '';
                    comment_box = comment_box + '<div class="ratings"><p class="pull-right">' + records.length;
					
					//if the number of records is one print review instead of reviews
                    if (records.length == 1)
                        comment_box = comment_box + ' review</p><p>';
                    else
                        comment_box = comment_box + ' reviews</p><p>';
					
					//calculate total stars
                    var rev_tot = 0;
                    comm_box = '';
					
					//if there are no reviews, say so
                    if (records.length == 0)
                    {
                        comm_box = comm_box + '<hr><div class="row"><div class="col-md-12">';

                        comm_box = comm_box + '<p>There are no reviews yet. Write a review!</p></div></div>';

                        comm_box = comm_box + '</div></div></div>';

                    }
					//else populate the revies
                    else
                    {
                        for (var i = 0; i < records.length; i++)
                        {
                            records[i][2] = parseInt(records[i][2]);
                            rev_tot = rev_tot + records[i][2];

                            comm_box = comm_box + '<hr><div class="row"><div class="col-md-12">';


                            for (var j = 0; j < records[i][2]; j++)
                            {
                                comm_box = comm_box + '<span class="glyphicon glyphicon-star"></span>';
                            }
                            for (var j = records[i][2]; j < 5; j++)
                            {
                                comm_box = comm_box + '<span class="glyphicon glyphicon-star-empty"></span>';
                            }
                            comm_box = comm_box + ' ' + records[i][3] + '<span class="pull-right">';



                            comm_box = comm_box + records[i][4] + ' days ago</span>';
                            comm_box = comm_box + '<p>' + records[i][5] + '</p></div></div>';

                            comm_box = comm_box + '</div></div></div>';
                        }

                        rev_tot = rev_tot / records.length;
                    }


                    for (var i = 0; i < Math.floor(rev_tot); i++)
                    {
                        comment_box = comment_box + '<span class="glyphicon glyphicon-star"></span>';
                    }

                    for (var i = Math.floor(rev_tot); i < 5; i++)
                    {
                        comment_box = comment_box + '<span class="glyphicon glyphicon-star-empty"></span>';
                    }

                    comment_box = comment_box + rev_tot + ' stars</p></div></div><div class="well"><div class="text-right">';
                    comment_box = comment_box + '<a class="btn btn-success">Leave a Review</a></div>';

                    comment_box = comment_box + comm_box;



                    $('comments').html(comment_box);



					//Populate the cart
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

                }); // End .done
            });
		}


            function getTotalPages()
            {
                $.get("./total_pages.txt")

                // The '.done' method fires when the get request completes
                .done(function(data)
                {

                    var total_pages = data;
                    loadTableData(1, 10);
                    $('#pagination-demo').twbsPagination(
                    {
                        totalPages: total_pages,
                        visiblePages: 10,
                        onPageClick: function(event, page)
                        {
                            $('#page-content').text('Page ' + page);
                            loadTableData(page, 10);
                        }
                    });

                });

            }

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




            getTotalPages();


        }(jQuery));




    function AddCart()
    {
        var url_id = getParameterByName('id');
        $.post('http://alliancedev.xyz/AllianceDev/addtocart.php',
        {
            cart: '(1,' + url_id + ')'
        });
        //console.log("done");
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
</script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>