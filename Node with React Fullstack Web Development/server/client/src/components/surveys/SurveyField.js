import React from 'react';

export default ({ label, input, meta: { error, touched } }) => {
	return (
		<div>
			<label>{label}</label>
			<input autoComplete="off" {...input} style={{ marginBottom: '5px' }} />
			<div className="red-text" style={{ marginBottom: '20px' }}>
				{ touched && error }
			</div>
		</div>
	);
}