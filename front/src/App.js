import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';



class App extends Component {

  constructor(props){
    super(props);
    this.state = {
      clicks : 0,
      waitingCount : 1
    }

    fetch("http://"+window.location.hostname+":20000/clicks", {
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      }
    })
      .then(response => response.json())
      .then(data => 
        this.setState({
          clicks : data.clicks,
          waitingCount : this.state.waitingCount - 1
        })
      );
 }
  render () {
    var clicks = this.state.clicks;
    var wCount = this.state.waitingCount;

    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <h1 className="App-title">Welcome to One, the only app you need</h1>
        </header>
        <p className="App-intro">
          <button className={wCount?"btn btn--stripe loading":"btn btn--stripe"} onClick={this.handleClick}><span role="image">🐭</span> Click ({clicks})</button>
        </p>
      </div>
    );
  }

  handleClick = () =>  {

    this.setState({
      waitingCount : this.state.waitingCount + 1
    })

    fetch("http://"+window.location.hostname+":20000/click", {
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      }
    })
      .then(response => response.json())
      .then(data => 
        this.setState({
          clicks : this.state.clicks + 1,
          waitingCount:  this.state.waitingCount - 1
        })
      );

  }
}

export default App;
