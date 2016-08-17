var Caja = React.createClass({
  render: function () {
    return (
      <div className="caja">
        <h2>Hola ameo</h2>
      </div>
    );
  }
});

ReactDOM.render(
  <Caja />,
  document.getElementById('app')
);
