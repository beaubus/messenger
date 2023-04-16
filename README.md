# Messenger
Simple CRUD Laravel and Vue app with Laravel Breeze authentication.
It allows new users to register and create/update/delete messages.

## Installation

1. Rename .env.example to .env and fill all DB_ parameters
2. Run `composer install`
3. Run `npm install && npm run build`
4. Run `cp .env.example .env` and configure database connection 
5. Run `php artisan key:generate && php artisan storage:link`
6. Run `php artisan migrate`
7. Run `php artisan serve`

## Main steps to recreate the project from scratch

1. Create a new Laravel/Vue project with Breeze authentication:
`composer create-project laravel/laravel .`
`composer require laravel/breeze --dev`
`php artisan breeze:install`
2. Install vue plugin for vite to use .vue components
`npm install @vitejs/plugin-vue`
```js
import Vue from 'vitejs/plugin-vue'
//...
Vue({
    //...
    template: {
        transformAssetUrls: {
            base: null,
            includeAbsolute: false,
        }
    }
})
```
3. Create a Message model and migration using `php artisan make:model Message -m`
4. Define the necessary fields in the messages table (e.g., id, user_id, content, created_at, updated_at)
5. Run the migrations
6. Set up relationships in the User and Message models (hasMany and belongsTo)
7. Create a MessageController using php artisan make:controller MessageController. Implement CRUD actions.
8. Add a resource route to the `web.php`
9. Create the following Vue components for the application: App, Messages, MessageForm, Message, and MessageUpdate
10. Add fetch methods to the App.vue: 'addMessage', 'editMessage', 'deleteMessage', 'reloadMessage' 
13. Implement MessageForm component to add new messages 
12. Implement Message component to display message
13. Implement Messages component to display list of the messages
14. Add styling to the components
