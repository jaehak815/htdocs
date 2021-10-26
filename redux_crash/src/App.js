import { Provider } from 'react-redux';
import Posts from './components/Posts'
import PostForm from './components/Postform'
import { Component } from 'react';
import store from './store';



class App extends Component {
  render(){
  return (
    <Provider store={store}>
    <div className="App">
      <header className="App-header">

      </header>
      <PostForm />
      <hr />
      <Posts />
    </div>
    </Provider>
  );
}
}

export default App;
