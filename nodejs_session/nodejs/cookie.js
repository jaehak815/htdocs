var http = require('http');
var cookie =require('cookie');
http.createServer(function(request, response){ 
    console.log(request.headers.cookie);
    var cookies ={};
    if(request.headers.cookie !== undefined){
         cookies = cookie.parse(request.headers.cookie);
    } 
    console.log(cookies.yummy_cookie);
    //max나 expire를 쓰면 permanent쿠키 만들수있다
    response.writeHead(200, {
        'Set-Cookie':[
            'yummy_cookie=choco', 
        'tasty_cookie=strawberry',
        `Permanent=cookies; Max-Age=${60*60*24*30}`,//한달뒤에 없어지기로
         'Secure=Secure; Secure',
         'HttpOnly=HttpOnly; HttpOnly',
         'Path=Path; Path=/cookie',
         'Domain=Domain; Domain=o2.org'   
    ]
    });
    response.end('Cookie!!');
}).listen(3000);