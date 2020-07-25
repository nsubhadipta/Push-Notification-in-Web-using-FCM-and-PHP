importScripts("https://www.gstatic.com/firebasejs/3.7.4/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/3.7.4/firebase-messaging.js");

firebase.initializeApp({
    'messagingSenderId': '********'
  });

  const messaging = firebase.messaging();
  
//   messaging.usePublicVapidKey("BPgR1lXgvtlAQMn2OY3r78-J0Jsn_wyuEOGyjEjVYhaSIe1U-eyJshoOV3UUx4kfpgxY-gRHlmSfThXz2Gu1vi8");
  
