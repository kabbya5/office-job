const Manager = require('./manager');
let manager = null;
module.exports = (io, socket) =>{
    if(!manager){
        manager = new Manager(io);
    }

    socket.on('join:room', data => {
        manager.joinRoom(socket, data.roomKey, data.user_id);
    });

    socket.on('disconnect', () => {
        manager.handleDisconnect(socket);
    });
}