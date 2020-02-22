import React, {Component} from 'react';

class SubmitButton extends Component {

	render() {
		return (
  			<button onClick={this.props.onClick} type="button" className="btn btn-primary">{this.props.submitText}</button>
		);
	}
}

export default SubmitButton;