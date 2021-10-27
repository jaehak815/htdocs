const EventEmitter = require('events');
const uuid = require('uuid');

console.log(uuid.v4());
//

class Logger extends EventEmitter {
    log(msg) {
        //Call event
        this.emit('message', { id:uuid.v4(), msg });
    }
}

//module.exports = Logger;

const logger = new Logger();

logger.on('message', (data) => console.log('Called Listener', data ));

logger.log('hello World');
//Called Listener { id: '1fb67c6b-96e7-***************', msg: 'hello World' }
logger.log('hello World');
logger.log('Hi');
logger.log('Hello');