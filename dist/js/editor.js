var slide_data = {
	"background": "http://placehold.it/750x250",
	"overlays": [
		{
			"id": 1,
			"src" : "http://placehold.it/100x100",
			"left" : '0%',
			"top" : '25%'

		},
		{
			"id": 2,
			"src" : "http://placehold.it/100x100",
			"left" : '30%',
			"top" : '25%'
		},
		{
			"id": 3,
			"src" : "http://placehold.it/100x100",
			"left" : '60%',
			"top" : '40%'
		},
		{
			"id": 4,
			"src" : "http://placehold.it/100x100",
			"left" : '80%',
			"top" : '70%'
		}
	]
}


//TODO: on top level, parse the data, and convert it to some props object or smth
var BackgroundComponent = React.createClass({
	handleOverlayMoved : function(overlay){

	},
	render: function(){
		var overlays = this.props.data.overlays.map(function(overlay){
			return (
				<OverlayComponent 
						onOverlayMoved={this.handleOverlayMoved} 
						data={overlay} 
						key={overlay.id}/>
			);
		});

		return(
			<div className="backgroundComponent" >
				{overlays}	
			</div>
		);
	}
});

var OverlayComponent = React.createClass({
	render: function(){
		var overlayStyle = {
			backgroundImage: 'url('+this.props.data.src+')',
		    width: '100px',
			height: '100px',
			position: 'absolute',
			top: this.props.data.top,
			left: this.props.data.left

		};
		return(
			<div className="overlay"  style={overlayStyle}>
				{this.props.content}
			</div>
		);
	}
});

React.render(
	<BackgroundComponent data={slide_data} />,
	document.getElementById('slide_editor')
);
