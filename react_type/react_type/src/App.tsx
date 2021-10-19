import React, { useState} from 'react';
import logo from './logo.svg';
import './App.css';
import List from "./components/List"
import AddToList from "./components/AddToList"
export interface IState {
  people: {
    name: string
    age: number
    url: string
    note?: string
  }[]
}

function App() {

 const [people, setPeople] = useState<IState["people"]>([

 {
   name: "LeBron james",
   url: "https://blogfiles.pstatic.net/MjAyMTEwMDVfMjc3/MDAxNjMzNDQ1OTE3NDMw.tRm2xPpKQCOTbH8GkkaJL1s_USxz-cf38zPIft-NiHAg.Z2QPTtuKR5phahbK7Lrx4qUsYlRM9sooBFztDZwGPa4g.JPEG.pys0382/IMG_0275.JPG",
   age:36,
   note: "Allegeric to staying on the same team"
 }

])
  return (
    <div className="App">
      <h1>People Invited to my Party</h1>
      <List people = {people} />
      <AddToList people={people} setPeople={setPeople} />
    </div>
  );
}

export default App;
