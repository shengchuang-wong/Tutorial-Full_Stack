const express = require('express');
const mongoose = require('mongoose');
const cookieSession = require('cookie-session');
const passport = require('passport');
const keys = require('./config/keys');
require('./models/User');
require('./models/Survey');
const bodyParser = require('body-parser');
require('./services/passport');

mongoose.connect(keys.mongoURI, {
	useMongoClient: true
});

const PORT = process.env.PORT || 5000;
const app = express();

app.use(bodyParser.json());

app.use(
	cookieSession({
		maxAge: 30 * 24 * 60 * 60 * 1000,
		keys: [keys.cookieKey]
	})
);
app.use(passport.initialize());
app.use(passport.session());

//////////////////////////////////////////////
require('./routes/authRoutes')(app);
require('./routes/billingRoutes')(app);
require('./routes/surveyRoutes')(app);

if (process.env.NODE_ENV === 'production') {
	// Express will serve up production assests like main.js
	app.use(express.static('client/build'));


	const path = require('path');
	app.get('*', (req, res) => {
		res.sendFile(path.solve(__dirname, 'client', 'build', 'index.html'));
	});
}
//////////////////////////////////////////////

app.listen(PORT);
console.log(`Server are running on PORT ${PORT}`);