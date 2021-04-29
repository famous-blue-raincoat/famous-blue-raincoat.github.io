
const ws = require('nodejs-websocket');

const TYPE_ENTER = 0;
const TYPE_LEAVE = 1;
const TYPE_MSG = 2;

let count = 0;
const server = ws.createServer(conn => {
  console.log('新连接');
  count++;
  conn.userName = `用户${count}`
  today = new Date();
  hour = today.getHours();
  minute = today.getMinutes();
  second = today.getSeconds();
  scale = hour + ":" + minute + ":" + second;
  broadcast({
    type: TYPE_ENTER,
    msg: `${conn.userName}加入聊天室`,

    time: scale
  });

  //接受到客户端的数据触发该事件
  conn.on('text', data => {
    today = new Date();
    hour = today.getHours();
    minute = today.getMinutes();
    second = today.getSeconds();
    scale = hour + ":" + minute + ":" + second;
    data = conn.userName + ': ' + data;
    broadcast({
      type: TYPE_MSG,
      msg: data,
      time: scale
    });
  });

  conn.on('close', () => {
    console.log('关闭连接')
    count--;
    today = new Date();
    hour = today.getHours();
    minute = today.getMinutes();
    second = today.getSeconds();
    scale = hour + ":" + minute + ":" + second;
    broadcast({
      type: TYPE_LEAVE,
      msg: `${conn.userName}离开了聊天室`,
      time: scale

    })
  });
  conn.on('error', () => {
    console.log('异常');
  });
});

const broadcast = (msg) => {
  server.connections.forEach(item => {
    item.send(JSON.stringify(msg));
  });
}

server.listen(3001, () => {
  console.log('监听3001');
});