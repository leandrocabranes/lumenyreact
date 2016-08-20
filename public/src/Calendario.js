var Calendario = React.createClass({
  getInitialState: function () {
    return {
      alleventos: []
    }
  },
  componentDidMount: function () {

  },
  _getEventos: function () {
    $.get('/calendario/todos', function (data) {
      this.setState({ alleventos: data });
    }.bind(this));
  },
  render: function () {
    var handleEventos = this.state.alleventos.map(function (evento) {
      return <Evento key={evento.id} fecha={evento.fecha} lugar={evento.lugar} />
    });
    return (
      <div className="container">
        <div className="panel panel-default">
          <div className="panel-heading">Calendario</div>
          {this._getEventos()}
          {handleEventos}
        </div>
      </div>
    );
  }
});

var Evento = React.createClass({
  render: function () {
    return (
      <div className="row">
        <div className="col-sm-12">
          {this.props.fecha} en {this.props.lugar}
        </div>
      </div>
    );
  }
});


ReactDOM.render(
  <Calendario />,
  document.getElementById('app')
);
