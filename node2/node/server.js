//var mysql = require('mysql')
//// Let’s make node/socketio listen on port 3000
//var io = require('socket.io').listen(3000)
//// Define our db creds
//var db = mysql.createConnection({
//    host: 'localhost',
//    user: 'root',
//    database: 'clasificados'
//})
// 
var app = require('http').createServer(handler),
  io = require('socket.io').listen(app),
  fs = require('fs'),
  mysql = require('mysql'),
  db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'clasificados',
    port: 3306
  });

// Log any errors connected to the db
db.connect(function(err){
    if (err) console.log(err)
})

// creating the server ( localhost:8000 )
app.listen(3000);

// on server started we can load our client.html page
function handler(req, res) {
  fs.readFile(__dirname + '/index.html', function(err, data) {
    if (err) {
      console.log(err);
      res.writeHead(500);
      return res.end('Error loading index.html');
    }
    res.writeHead(200);
    res.end(data);
  });
}
 
// Define/initialize our global vars
var notes = []
var isInitNotes = false
var socketCount = 0
 
io.sockets.on('connection', function(socket){
    // Socket has connected, increase socket count
    socketCount++
    console.log('Number of connections:' + socketCount);
    // Let all sockets know how many are connected
    io.sockets.emit('users connected', socketCount)
 
    socket.on('disconnect', function() {
        // Decrease the socket count on a disconnect, emit
        socketCount--
        console.log('User disconected, number of connections:' + socketCount);
        io.sockets.emit('users connected', socketCount)
    })
 
    socket.on('new note', function(data){
        // Use node's db injection format to filter incoming data
       // db.query('INSERT INTO clasificado (texto) VALUES (?)', data.texto)
        // New note added, push to all sockets and insert into db
        notes.push(data)
        io.sockets.emit('new note', data)
    })
 
    // Check to see if initial query/notes are set
    if (! isInitNotes) {
        // Initial app start, run db query
        db.query('SELECT * FROM clasificado order by id_clasificado desc')
            .on('result', function(data){
                // Push results onto the notes array
                notes.push(data)
            })
            .on('end', function(){
                // Only emit notes after query has been completed
                socket.emit('initial notes', notes)
            })
 
        isInitNotes = true
    } else {
        // Initial notes already exist, send out
        socket.emit('initial notes', notes)
    }
})

console.log('Please use your browser to navigate to http://localhost:3000')
