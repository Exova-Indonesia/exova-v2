window._ = require("lodash");

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo";

window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true,
});

// Web Push Notifications
// Firebase App (the core Firebase SDK) is always required and must be listed first
import firebase from "firebase/app";
import "firebase/messaging";

var firebaseConfig = {
    apiKey: "AIzaSyBem8hm_QXgBkzrVI7deL9YgC83Nkf99v0",
    authDomain: "elated-oxide-290910.firebaseapp.com",
    databaseURL: "https://elated-oxide-290910.firebaseio.com",
    projectId: "elated-oxide-290910",
    storageBucket: "elated-oxide-290910.appspot.com",
    messagingSenderId: "919542326880",
    appId: "1:919542326880:web:c64fb34f3327949d40c505",
    measurementId: "G-1EN9PNZZSJ",
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

messaging
    .requestPermission()
    .then(function () {
        return messaging.getToken({
            vapidKey:
                "BPlEOAI6adR2gORVv21YtIBkSHY7bjLduOAnxvaJ4vs-zbmOspP-zvBRg3pb7zclRUtPyPvmdW_TxLgp0gWZ3Yc",
        });
    })
    .then(function (token) {
        // console.log("Token : " + token);
        Livewire.emit("addDeviceToken", token);
    })
    .catch(function (err) {
        console.log("Unable to get permission to notify.", err);
    });

messaging.onMessage(function (payload) {
    const noteTitle = payload.notification.title;
    const noteOptions = {
        body: payload.notification.body,
        icon: payload.notification.icon,
    };
    new Notification(noteTitle, noteOptions);
});
