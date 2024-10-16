# Push Notification in Web using FCM and PHP

This project demonstrates how to create web push notifications using Firebase Cloud Messaging (FCM) and PHP.

## Overview

The project provides a method to set up a Web Push Notification service using Google Firebase Cloud Messaging and Firebase real-time database. With this setup, you can send notifications from your PHP server to users who have granted permission to receive notifications.

## Requirements

- Firebase Project
- HTTPS Enabled Website

## Project Structure

- **index.html**: The main HTML file where the push notification permissions are requested and tokens are generated.
- **notification.js**: Handles push notification subscription and interacts with Firebase Cloud Messaging.
- **firebase-messaging-sw.js**: The service worker file required to receive background push notifications.
- **manifest.json**: Defines the web app manifest for push notifications.
- **push.php**: PHP script to send push notifications via cURL.

## Setup Instructions

1. **Create a Firebase Project**
   - Go to [Firebase Console](https://console.firebase.google.com/) and create a new project.
   - Enable Firebase Cloud Messaging (FCM) for the project.

2. **Set up Firebase SDK**
   - Add Firebase SDK to your `index.html` file for client-side integration.

3. **Host on HTTPS**
   - Ensure your site is served over HTTPS. Push notifications require an HTTPS connection.

4. **Generate Token**
   - Use the Firebase SDK to generate FCM tokens and request permission from users to send notifications.

5. **Push Notification Files**
   - Place the following files on your server:
     - `index.html`
     - `notification.js`
     - `firebase-messaging-sw.js`
     - `manifest.json`

6. **Send Push Notification**
   - Use the `push.php` file to send push notifications via PHP cURL. The `push.php` script connects to the FCM API and sends notifications to the specified FCM token(s).

## Example Setup

### Token Generation

Use `index.html` and `notification.js` to generate an FCM token for the user. The token will be stored and later used to send push notifications.

### Sending Push Notifications via PHP

The `push.php` script sends the push notifications to the user. Ensure you have the following data to send:
- The FCM token (generated from the client-side).
- The notification message and payload.

### Example Commands

To send a notification, run the `push.php` script after setting up your FCM credentials.

## Files

- **index.html**: Client-side HTML for requesting push notification permission.
- **notification.js**: JavaScript for handling the Firebase SDK.
- **firebase-messaging-sw.js**: Firebase service worker for background notifications.
- **manifest.json**: Web manifest required for push notifications.
- **push.php**: PHP script to send notifications using cURL.

## For Any Doubts

Feel free to check my profile for assistance: [LinkedIn](https://www.linkedin.com/in/subhadipta-nayak/)
