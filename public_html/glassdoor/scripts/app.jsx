var Chart = React.createClass({
    _renderChart: function(data) {
        this.chart = c3.generate({
            bindto: '#chart',
            data: {
                columns: [],
                xs: {},
                type: 'scatter'
            },
            axis: {
                x: {
                    label: 'Job count',
                    tick: {
                        fit: false
                    }
                },
                y: {
                    label: 'Median salary'
                }
            }
        });
    },
    componentDidMount: function () {
        var data = [
        ];
        this._renderChart(data);
    },
    componentWillReceiveProps: function (data) {
        this.chart.unload();
        this.chart.load({
                columns: data.data.data,
                xs: data.data.xs
        }); 
    },
    render: function() {
        return (
          <div id="chart"></div>
        );
    }
});


var App = React.createClass({
    chart: undefined,
    getInitialState: function() {
        return {
            apiUrl: 'http://api.glassdoor.com/api/api.htm?t.p=105003&t.k=gOL6dRbpBjg&userip=192.168.0.1&useragent=Chrome&format=json&v=1&action=jobs-prog&countryId=1&jobTitle=',
            data: [],
            searchBox: ''
        }
    },
    updateInputValue: function(evt) {
    this.setState({
      searchBox: evt.target.value
    })},
    getData: function(event) {
      var a = event;
      $.get({
        crossDomain: true,
        type: "GET",
        contentType: "application/json; charset=utf-8",
        url: this.state.apiUrl + this.state.searchBox,
        context: this,
        ProcessData: true,
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'XMLHttpRequest'
        },
      })
      .done(function(data) {
        var results = data.response.results;
        var chartData = {};
        chartData.data = [];
        chartData.xs = {};
        for(var i = 0; i < results.length; i++) {
            chartData.data.push([results[i].nextJobTitle,results[i].medianSalary]);
            chartData.data.push([results[i].nextJobTitle + '_x',results[i].nationalJobCount]);
            chartData.xs[results[i].nextJobTitle] = results[i].nextJobTitle + '_x'; 
        }
        console.log(chartData);
        this.setState({
          data: chartData
        })
      });
    },
    render: function() {
        return (
        <div>
          <div className="form-inline">
            <div className="form-group">
              <label htmlFor="searchBox">Job title to search: </label>
              <input type="text" className="form-control" id="searchBox" placeholder="Programmer" value={this.state.searchBox} onChange={this.updateInputValue} />
            </div>
            <button type="submit" className="btn btn-default" onClick={(event) => this.getData(event)}>Search</button>
          </div>
          <Chart data={this.state.data}/>
        </div> 
        );
    }
});

ReactDOM.render(
  <App/>,
  document.getElementById('container')
);