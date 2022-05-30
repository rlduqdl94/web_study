
/* 설치한 express 모듈 불러오기 */
const express = require('express')

/* 설치한 socket.io 모듈 불러오기 */
const socket = require('socket.io')

/* Node.js 기본 내장 모듈 불러오기 */
const http = require('http')

/* Node.js 기본 내장 모듈 불러오기 */
const fs = require('fs')

/* express 객체 생성 */
const app = express()

/* express http 서버 생성 */
const server = http.createServer(app)

/* 생성된 서버를 socket.io에 바인딩 */
const io = socket(server)

var id_arr = new Array();
app.use('/', express.static('./'))
app.use('/', express.static('./'))


/* Get 방식으로 / 경로에 접속하면 실행 됨 */
app.get('/', function(request, response) {
    fs.readFile('./room_node.html', function(err, data) {
    if(err) {
      response.send('에러')
    } else {
      response.writeHead(200, {'Content-Type':'text/plain; charset=utf-8'});
      response.write(data)
      response.end()
    }
  })
})


io.sockets.on('connection', function(socket) {

  /* 새로운 유저가 접속했을 경우 다른 소켓에게도 알려줌 */
  socket.on('newUser', function(name) {

    console.log(name + ' 님이 접속하였습니다.')

    /* 소켓에 이름 저장해두기 */
    socket.name = name

    /* 모든 소켓에게 전송 */
    id_arr.push(name);
    io.sockets.emit('update', {type: 'connect', id_arr: id_arr, name: 'SERVER', id_name: name, message: name + '님이 접속하였습니다.'})



  })

  /* 전송한 메시지 받기 */
  socket.on('message', function(data) {
    /* 받은 데이터에 누가 보냈는지 이름을 추가 */
    data.name = socket.namef

    data.id_arr = id_arr

    console.log(data)
    console.log(data.number)
    
    // 파이썬 시작


    const spawn = require('child_process').spawn;

// // 2. spawn을 통해 "python 파이썬파일.py" 명령어 실행
    const result = spawn('python', ['./forms/str_reservation.py']);




// const result = spawn('python', ['./forms/test13.py',data.message,data.number]);

// result.stdout.on('data', (result)=>{ console.log(result.toString()); });



// // 3. stdout의 'data'이벤트리스너로 실행결과를 받는다.
// result.stdout.on('data', function(data) {
//     console.log(data.toString());
//     // mess_data = data.toString();
//     io.sockets.emit('update', {type: 'connect', id_arr: id_arr, mess_data: '전송완료'})

// });

// // 4. 에러 발생 시, stderr의 'data'이벤트리스너로 실행결과를 받는다.
// result.stderr.on('data', function(data) {
//     console.log(data.toString());
// });


//     /* 보낸 사람을 제외한 나머지 유저에게 메시지 전송 */
//     socket.broadcast.emit('update', data);




  })




  /* 접속 종료 */
  socket.on('disconnect', function() {
    console.log(socket.name + '님이 나가셨습니다.')
    id_arr = id_arr.filter((element) => element !== socket.name);
    /* 나가는 사람을 제외한 나머지 유저에게 메시지 전송 */
    socket.broadcast.emit('update', {type: 'disconnect', id_arr: id_arr, name: 'SERVER', exit_name : socket.name, message: socket.name + '님이 나가셨습니다.'});




  })
})

/* 서버를 8080 포트로 listen */
server.listen(8080, function() {
  console.log('서버 실행 중..')
})
