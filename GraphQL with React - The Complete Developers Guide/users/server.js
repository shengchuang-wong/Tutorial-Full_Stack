const express = require('express');
const expressGrahpQL = require('express-graphql');
const schema = require('./schema/schema');

const app = express();

app.use('/graphql', expressGrahpQL({
    schema,
    graphiql: true
}));

app.listen(4000, () => {
    console.log('Listening');
});