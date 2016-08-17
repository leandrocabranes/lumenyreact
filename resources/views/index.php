<html>
<head>
  <meta charset="utf-8">
  <title>React y Lumen</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
  <script src="https://npmcdn.com/react@15.3.0/dist/react.js"></script>
  <script src="https://npmcdn.com/react-dom@15.3.0/dist/react-dom.js"></script>
  <script src="https://npmcdn.com/babel-core@5.8.38/browser.min.js"></script>
  <script src="https://npmcdn.com/jquery@3.1.0/dist/jquery.min.js"></script>
  <style>
    body {
      font-family: 'PT Sans Narrow', sans-serif;
    }
  </style>
</head>
<body>
  <div id="app"></div>
  <script type="text/babel">

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

  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
