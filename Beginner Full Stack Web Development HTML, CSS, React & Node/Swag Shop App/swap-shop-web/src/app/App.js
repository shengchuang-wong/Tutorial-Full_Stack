import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

// Components
import Product from '../product/product';
import WishList from '../wishlist/wishlist';
import Form from '../form/add-product-form';

// Services
import HttpService from '../services/http-service';

const http = new HttpService();
var formThings = [{"name": "title", "placeholder": "title..."}, {"name": "price", "placeholder": "price..."}, {"name": "imgUrl", "placeholder": "Image URL..."}];
const FORM_ID = "register-form";
class App extends Component {

  constructor(props) {
    super(props);

    this.state = {
      products: []
    };

    // Bind functions
    this.loadData = this.loadData.bind(this);
    this.productList = this.productList.bind(this);
    this.addProduct = this.addProduct.bind(this);

    this.loadData();
  }



  loadData = () => {
    var self = this;
    http.getProducts().then(data => {
      console.log(data);
      self.setState({products: data})
    }, err => {

    });
  }

  
  productList = () => {
    const list = this.state.products.map((product) => 
      <div className="col-sm-4" key={product._id}>
        <Product product={product}/>
      </div>
    );

    return (list);
  }

  addProduct = (e) => {
    let form = document.getElementById(FORM_ID);
    var self = this;
    http.addProduct(new FormData(form)).then(data => {
      console.log(data);
      var tempProduct = this.state.products;
      tempProduct.push(data);
      self.setState({products: tempProduct})
    }, err => {

    });
  }


  render() {
    return (
      <div className="App">
        <div className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <h2>Welcome to React JS</h2>
        </div>
        <div className="container-fluid App-main">
          <div className="row">
            <div className="col-sm-8">
              <div className="row">
                {this.productList()}
              </div>
            </div>
            <div className="col-sm-4">
              <WishList />
            </div>
          </div>
          <Form formId={FORM_ID} clickMethod={this.addProduct} textbox={formThings} formTitle="Add Product Form" submitText="Submit" />
        </div>
      </div>
    );
  }
}

export default App;
