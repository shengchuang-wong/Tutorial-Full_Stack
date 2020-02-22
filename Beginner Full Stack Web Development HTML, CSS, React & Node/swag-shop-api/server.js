var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var mongoose = require('mongoose');
var db = mongoose.connect('mongodb://localhost/swag-shop', {
	useMongoClient: true
});

var Product = require('./model/product');
var WishList = require('./model/wishlist');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));

app.post('/product', function(request, response) {
	var product = new Product();
	product.title = request.body.title;
	product.price = request.body.price;
	product.save(function(err, savedProduct) {
		if(err) {
			response.status(500).send({error: "Could not save product"});
		} else {
			response.status(200).send(savedProduct);
		}
	})
});

app.get('/product', function(request, response) {
	console.log(1);
	Product.find({}, function(err, products) {
		if(err) {
			response.status(500).send({error: "Could not fetch product"});
		} else {
			response.status(200).send(products);
		}
	});
	console.log(3);
	// will print 1, 3, 2 since find is asynchronous, print when done fetching
});

app.get('/product/:productTitle', function(request, response) {

	Product.find({"title": request.params.productTitle}, function(err, products) {
		if(err) {
			response.status(500).send({error: "Could not fetch product"});
		} else {
			response.status(200).send(products);
		}
	});

});

app.get('/wishlist', function(request, response) {
	WishList.find({}).populate({path: 'products', model: 'Product'}).exec(function(err, wishLists) {
		if(err) {
			response.status(500).send({error: "Could not fetch wishlists"});
		} else {
			response.status(200).send(wishLists);
		}
	});
});

app.post('/wishlist', function(request, response) {
	var wishList = new WishList();
	wishList.title = request.body.title;

	wishList.save(function(err, newWishList) {
		if(err) {
			response.status(500).send({error: "Could not create wishlist"});
		} else {
			response.send(newWishList);
		}
	});

});

app.put('/wishlist/product/add', function(request, response) {
	Product.findOne({_id: request.body.productId}, function(err, product) {
		if(err) {
			response.status(500).send({error: "Could not add data to wishlist"});
		} else {
			WishList.update({_id: request.body.wishListId}, {$addToSet: {products: product._id}}, function(err, wishList) {
				if(err) {
					response.status(500).send({error: "Could not create wishlist"});
				} else {
					response.send(wishList);
				}
			})
		}
	});
});

app.listen(3001, function() {
	console.log("Swag Shop API running at port 3001...");
});