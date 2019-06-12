/* Implementation de l'interface web pour la gestion du Smart Parking. Nous établirons la communication à l'aide
des websocket.on sécurisera cette connexion en utilisant des websocket sécurisées Wss. Plus d'informations sont
disponibles sur la page de documentation de Artik.  */

/************************************ Declaration des variables ************************************************/

isWebSocketReady = true;
let wsUri = "wss://api.artik.cloud/v1.1/websocket?ack=true";   // URL de connexion à la plate-forme Artik grace au Websocket.

const devices = [
    {
        id: "",       // First device Pi DEVICE ID
        token: "",   //Second device DEVICE TOKEN
        DOMSelector: 'Personnel',
        badge:"Rouge",
        capacity: 50,

    },
    {
        id: "",     //  Second device parking DEVICE ID
        token: "",  // Second device parking DEVICE TOKEN
        DOMSelector: 'Etudiants',
        badge:"Bleu",
        capacity: 60,

    }
];

let output;
let attributes_log;
let websocket;
/***********************************************************************************************************/


function init() {
    // cette fonction getElementById() permet d'ecrire des elements (retourne une reference) dans notre page HTML.
    output = document.getElementById("output");
    attributes_log = document.getElementById("attributes_log");

    if (browserSupportsWebSockets() === false) {
        // On vérifie si notre navigateur supporte ou pas les websocket.
        //writeToScreen("Désolé! Votre navigateur web ne supporte pas les WebSockets. Veuillez réessayer en utilisant les dernières versions de Google Chrome ou Firefox");

        let element = document.getElementById("websocketelements");
        element.parentNode.removeChild(element);

        return;
    }

    websocket = new WebSocket(wsUri);    // Ouverture d'une connexion Websocket en faisant l'appel à son constructeur.

    websocket.onopen = function() {

        //writeToScreen("Connexion établie avec le Système Smart Parking");
        /**devices.forEach(function(device) {
            register(device);// Après l'ouverture de la connexion on utilise la la fonction register() décrite plus en bas pour laz transmission des données sécurisées.
        });*/

        for (let i=0; i <= devices.length; i++) {
            register(devices[i]);    // Fonction d'enregistrement des devices.
        }
    };

    websocket.onmessage = function(evt) {
        onMessage(evt);        // Reception d'un nouveau message suite à un évènement.
    };

    websocket.onerror = function(evt) {
        onError(evt);  // Notification d'erreur en cas de problème.
    };
}

function onClose(evt) {
    websocket.close();   // Fermeture de la connexion avec la Websocket.
    //writeToScreen("Déconnexion");
}

function onMessage(evt) {
    //writeToScreen('<span style="color: deepskyblue;">REPONSE: ' + evt.data + '</span>');  // Affichage données de l'evenement.
    handleRcvMsg(evt.data);     // Envoi des données vers la fonction handleRcvMsg().
}

function onError(evt) {
    //writeToScreen('<span style="color: red;">ERREUR:</span> ' + evt.data);
}

function doSend(message) {
    websocket.send(message);      // Fonction d'envoi pour les messages.
    //writeToScreen("Envoi: " + message);
}

function writeAttributeValues(prefix) {
    let pre = document.createElement("p");  // Création d'un element HTML identifié par un tag.
    pre.style.wordWrap = "break-word";
    pre.innerHTML = "INFORMATIONS " + getCurrentDate() + " " + prefix + "<b> readyState: " + websocket.readyState + " bufferedAmount: " + websocket.bufferedAmount + "</b>";
    attributes_log.appendChild(pre);
}

function writeToScreen(message) {       // Fonction d'affichage des messages.
    let pre = document.createElement("p");
    pre.style.wordWrap = "break-word";
    pre.innerHTML = message;
    output.appendChild(pre);   // la fonction appendChild permet de calculer la valeur de l'output.
}

function getCurrentDate() {    // Fonction de recuperation de la date et le temps.
    let now = new Date();
    let datetime = now.getFullYear() + '/' + (now.getMonth() + 1) + '/' + now.getDate();  // recuperation date.
    datetime += ' ' + now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds();   // recuperation temps.
    return datetime;
}

function browserSupportsWebSockets() {     // Fonction de vérification pour le support de la Websocket
    if (!("WebSocket" in window)) {
        return false;
    } else {
        return true;
    }
}

function getTimeMillis(){
    return parseInt(Date.now().toString());
}

function register(device){      // Fonction d'enregistrement
    //writeToScreen("Enregistrement du périphérique sur la connexion WebSocket");
    try{
        //Vérification de la correspondance des variables déclarées ci dessus.
        let registerMessage = '{"type":"register", "sdid":"'+device.id+'", "Authorization":"bearer '+device.token+'", "cid":"'+getTimeMillis()+'"}';
        //writeToScreen('Envoi du message enregistrement ' + registerMessage + '\n');

        websocket.send(registerMessage, {mask: true});
        //document.getElementById("rainbow").innerHTML = "";
        //document.getElementById("rainbow").innerHTML = "Capacity:"+'<span style="color: red;">50</span> '+"Free Slot:"+'<span style="color: red;"></span>'+"50";
        //document.getElementById("indigo").innerHTML = "Capacity: 60,  Free Slot: 5";
    }
    catch (e) {
        //writeToScreen('Echec. Erreur lors de enregistrement des messages: ' + e.toString());
    }
}

// Fonction pour le traitement des données reçues


function handleRcvMsg(msg){
    /* Les messages sont reçus suivant le format
    {"actions":[{"name":"setText","parameters":{"text":"4", "text2": "5"}}]}
    Et nous devons donc les analyser et donc convertir les données du fichier JSON obtenu en object*/
    let msgObj = JSON.parse(msg);
    if (msgObj.type != "action") return;
    let device = devices.filter(device => device.id === msgObj.ddid)[0];  // Filtrage des devices pour recuperer la valeur
    let actions = msgObj.data.actions;
    let AvailablesPlaces = actions[0].parameters.text;
    console.log("L'action reçue est " + actions);

    if(AvailablesPlaces == 0){
        Swal.fire ({
            type:'info',
            title:"Notification de disponibilité",
            html: "Cher utilisateur il n'y a plus de place <br> disponible pour le Parking du Personnel. <br> Veuillez utiliser le Parking des Etudiants/invités <br> dont l'emplacement est indiqué dans la Map. </br> Merci pour votre bonne compréhension ! ",
            buttons: {
                confirm: "Compris"
            }
        }).then( val => {
            if(val)  {
                Swal.fire ({
                    type:'success',
                    title: "Merci...!",
                    text: "Excellente journée",
                });
            }
        });
    }
    document.getElementById(device.DOMSelector).innerHTML = "Badge: "+device.badge+", Capacité: "+device.capacity+",  Places Disponibles: "+AvailablesPlaces;


}


