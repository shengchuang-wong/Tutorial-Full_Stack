import 'whatwg-fetch';

class HttpService {
	getProducts = (param1, param2) => {
		var promise = new Promise((resolve, reject) => {
			fetch('http://localhost:3004/product')
			.then(response => {
				resolve(response.json());
				// reject("You suck!");
			})
		});

		return promise;
		
	}

	addProduct = (form) => {
		var promise = new Promise((resolve, reject) => {
			fetch('http://localhost:3004/product', {
			  method: 'POST',
			  headers: {
			    'Content-Type': 'application/json'
			  },
			  body: JSON.stringify({
			    title: form.get("title"),
			    price: form.get("price"),
			    imgUrl: form.get("imgUrl"),
			  })
			}).then(response => {
				resolve(response.json());
				// reject("You suck!");
			})
		});

		return promise;
	}
}

export default HttpService;