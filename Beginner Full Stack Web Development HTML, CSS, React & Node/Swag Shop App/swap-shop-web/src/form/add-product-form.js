import React, {Component} from 'react';
import SubmitButton from './submit-button';
import Textbox from './textbox';

class Form extends Component {

	constructor(props) {
	    super(props);

	    // Bind functions
	    this.textboxList = this.textboxList.bind(this);

  	}

  	textboxList = () => {
	    const list = this.props.textbox.map((textbox) => 
	      <div key={textbox.name} className="form-group col-sm-4">
	      	<Textbox key={textbox.title} name={textbox.name} placeholder={textbox.placeholder} />
		   </div>
	    );

	    return (list);
	  }


	render() {
		return (
			<form id={this.props.formId}>
	      <div className="form-group col-sm-4">
			  <h4>{this.props.formTitle}</h4>
			</div>
			  <br/>
                {this.textboxList()}
	      	<div className="form-group col-sm-4">

			  <SubmitButton onClick={this.props.clickMethod} submitText={this.props.submitText} />
			</div>
			</form>
		);
	}
}

export default Form;