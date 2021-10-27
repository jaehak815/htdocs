const http = require('http');

//Create server object
http.createServer((req, res)=>{
    //Write response
    res.write('Hello World');
    res.end()
}).listen(5000, () => console.log('Server running...'));
//Server running...
// the result on browser 5000port is  Hello World

