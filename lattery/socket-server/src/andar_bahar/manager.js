
const Engine = require('./enigine');

class Manager {
    constructor(io) {
        this.io = io;
        this.users = {};
        this.started = false;

        // Create one game engine
        this.room = new Engine(io, 'andar_bahar');
    }

    joinRoom(socket, roomKey, user_id) {
        for (const room of Array.from(socket.rooms)) {
            if (room !== socket.id && room !== roomKey) {
                socket.leave(room);
            }
        }

        socket.user_id = user_id;
        socket.roomKey = roomKey;

        // Correct Socket.IO method
        socket.join(roomKey);

        // Start the engine once
        if (!this.started) {
            this.started = true;
            this.room.start();
        }
    }

    handleDisconnect(socket) {
        console.log('User disconnected:', socket.id);
    }
}

module.exports = Manager;
