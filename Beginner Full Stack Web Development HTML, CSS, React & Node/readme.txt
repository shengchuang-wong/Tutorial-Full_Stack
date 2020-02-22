The following ST3 plugins are need for React development:

babel - for jsx syntax highlighting
install sublimelinter first
sublime-jshint - for linting your js code
sublime-jsxhint - for linting your jsx code


npm init <<< first command, is a must for node js

1. npm install --save express
2. npm install --save body-parser // parse data into json format
3. npm install -g nodemon // auto update file in running when file save -g is save into computer
4. npm install mongoose // connect to MongoDB
5. npm install --save whatwg-fetch // know http request

node server.js // start server
nodemon server.js // start and auto-refreshing server

MongoDB instruction
-------------------
"E:\MongoDB\Server\3.4\bin\mongod.exe" --dbpath "E:\MongoDB\Server\3.4\bin\data\db" <<< specify the db path and start the server
"E:\MongoDB\Server\3.4\bin\mongo.exe" start mongo DB

MongoDB Shell
-------------
use DATABASE_NAME // create database
db.products.insert("productName": "ABC", "price": 2.00) // create table and insert record
show collections // list table
db.products.find() // list record
db.products.find().pretty // list record in pretty format
db.products.find({"_id": ObjectId("59b4224c9d8608e59f7ee1b1")}) // find specify product by id
db.products.update({"productName":"Red Car"},{$set:{"price": 3.59}}) // update record
db.products.remove({"productName":"Pink Car"}) // remove record
db.products.remove({"productName":"Pink Car"},{justOne: true}) // remove only 1 record

MongoDB Documentation
---------------------
https://docs.mongodb.com/manual/tutorial/insert-documents/ 