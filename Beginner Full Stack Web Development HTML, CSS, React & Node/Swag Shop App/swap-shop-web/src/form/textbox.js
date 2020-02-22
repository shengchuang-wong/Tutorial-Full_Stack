import React, {Component} from 'react';

class Textbox extends Component {

	render() {
		return (
			<input type="textbox" className="form-control" name={this.props.name} placeholder={this.props.placeholder} />
		);
	}
}

export default Textbox;