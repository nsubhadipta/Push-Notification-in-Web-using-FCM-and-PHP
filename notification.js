// Initialize Firebase - https://firebase.google.com/docs/web/setup
  var config = {
    apiKey: "******************",
    authDomain: "******.firebaseapp.com",
    databaseURL: "https://******.firebaseio.com",
    projectId: "*******",
    storageBucket: "*******.appspot.com",
    messagingSenderId: "***********"
  };
  firebase.initializeApp(config);

const messaging = firebase.messaging();

// function fcm_get_fcm_push_token() {
//     return messaging.getToken();
//   }

//   function print_fcm_token() {
//     fcm_get_fcm_push_token().then(console.log);
//   }


messaging.requestPermission()
    .then(function() {
        return messaging.getToken();
    })
    .then(function(token) {
        // send rest call to add to database
        $.ajax('https://phpnot-97be7.firebaseio.com/pushtokens/'+token+'.json', {
            method: 'PUT',
            data: 'true',
            error: function(err) {
            }
        });
    })
    .catch(function(err) {
        console.log('Permission denied');
    });
