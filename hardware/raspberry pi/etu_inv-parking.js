//Transfert des données pour le Parking du des etudiants ou invités
/**********************************************************************************************************/
var webSocketUrl = "wss://api.artik.cloud/v1.1/websocket?ack=true";
var device_id = "";      // Second device parking DEVICE ID
var device_token = ""; // Second device parking DEVICE TOKEN
/******************************************************************************************************/
// La connexion requière l'utilisation d'une Websocket pour la communication avec la Raspberry.

var WebSocket = require('ws');
var isWebSocketReady = false;
var data = "";
var ws = null;
/**********************************************************************************************************/
// Elle requière également l'utilisant du module serialport  pour la communication avec la Raspberry.

var SerialPort = require('serialport');
var serialPort = SerialPort.serialPort;
var sp = new SerialPort("/dev/ttyACM0", {   // pour la communication serial avec l'arduino
    baudRate: 9600,                        // Puisque nous utilisons des cartes Arduino UNO donc la baudrate est de 9600
    parser: new SerialPort.parsers.Readline("\n")
});

/***************************************************************************************************************/

var parking_state = 0;   // variable pour vérifier l'état de stationnement

function getTimeMillis() {   // Fonction qui retourne le temps en millisecondes.
    return parseInt(Date.now().toString());
}


// Créez d'une connexion Websocket et configurez la broche GPIO.

function start() {
    // Création de la connexion Websocket
    isWebSocketReady = false;
    ws = new WebSocket(webSocketUrl);

    ws.on('open', function () {
        console.log("La connexion à la Websocket est ouverte ....");
        // A partir de là nous devons nous enregistrer  pour faire la transmission des données.
        // L'enregistrement est pour l'authentification et le transfert sécurisé des données.
        register();  // Ainsi donc pour cela on fait un appel de la fonction register() décrite plus en bas.
    });
    ws.on('message', function (data) {   // cette boucle est appelée chaque fois que le client envoie un message
        handleRcvMsg(data);   // Les données sont envoyées pour etre traitées par la fonction handleRcvMsg()
    });
    ws.on('close', function () {
        console.log("La connexion à la Websocket est fermée ....");

    });

}


// Envoie d'un message d'enregistrement à l'endpoint websocket . Le client ne fonctionnera que lorsque l'appareil sera enregistré à partir d'ici
function register() {
    console.log("Enregistrement du périphérique à partir de la connection WebSocket ");
    try {
        var registerMessage = '{"type":"register", "sdid":"' + device_id + '", "Authorization":"bearer ' + device_token + '", "cid":"' + getTimeMillis() + '"}';
        console.log('Envoi d\'un message enregistré ' + registerMessage + '\n');
        ws.send(registerMessage, {mask: true});
        isWebSocketReady = true;
    } catch (e) {
        console.error('Échec d\'enregistrement des messages. Erreur lors de l\'enregistrement du message: ' + e.toString());
    }
}


//les données après réception sont envoyées ici pour traitement dans notre cas,
// cette fonction ne sera pas utilisée car nous ne recevrons aucune action de la Raspberry Pi.

function handleRcvMsg(msg) {
    // vous devez analyser la chaîne reçue et en extraire la valeur du fichier JSON.
    var msgObj = JSON.parse(msg);
    if (msgObj.type != "action") return;

    var actions = msgObj.data.actions;
    var actionName = actions[0].name;
    console.log("L'action reçue est " + actionName);

    if (actionName.toLowerCase() == "parking_state") {
    } else {
        // Action effectué lors de la reception d'une action inconnue
        //console.log('Aucune operation n\'est posssible d\'effectuer car reception d\'une action non reconnue ' + actionName);
        return;
    }

}


// Envoi d'un message sur la Plateforme Artik Cloud.
// Cette fonction est responsable de l'envoi des commandes au cloud
//La function sendStateToArtikCloud(parking_slot) le nombre de places disponibles à la plateforme cloud.
function sendStateToArtikCloud(parking_slot) {
    try {
        ts = ', "ts": ' + getTimeMillis();
        var data = {
            "parking_slot": parking_slot
        };
        var payload = '{"sdid":"' + device_id + '"' + ts + ', "data": ' + JSON.stringify(data) + ', "cid":"' + getTimeMillis() + '"}';
        console.log('Envoi de données ' + payload + '\n');
        ws.send(payload, {mask: true});
    } catch (e) {
        console.error('Erreur lors de l\'envoi : ' + e.toString() + '\n');
    }
}

function exitClosePins() {
    console.log('Quittez et détruisez toutes les pins connectés!');
    process.exit();
}

start();
//// s'exécute chaque fois que des données sont reçues d'arduino (délai programmé de 30 secondes depuis l'arduino)
sp.on("open", function () {
    sp.on('data', function (data) {
        console.log("Le Port Serial reçoit des données:" + data);
        var parking_slot = parseInt(data);
        sendStateToArtikCloud(parking_slot);

    });
});

process.on('SIGINT', exitClosePins);
