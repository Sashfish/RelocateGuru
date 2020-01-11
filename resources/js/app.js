/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//const app = new Vue({
  //  el: '#app',
//});

//Vue.component('chat-component', require('./components/ChatComponent.vue').default);
//Vue.component('user-component', require('./components/UserComponent.vue').default);
//Vue.component('chat-messages-component', require('./components/ChatMessagesComponent.vue').default);
//Vue.component('chat-form-component', require('./components/ChatFormComponent.vue').default);
//Vue.component('message-component', require('./components/MessageComponent.vue').default);


  Vue.component('chat-messages', require('./components/ChatMessages.vue'));
  Vue.component('chat-form', require('./components/ChatForm.vue'));


  const app = new Vue({
      el: '#app',

      data: {
          messages: []
      },

      created() {
      this.fetchMessages();
      Echo.private('chat')
          .listen('MessageSent', (e) => {
              this.messages.push({
                  message: e.message.message,
                  user: e.user
              });
          });
  },
      methods: {
          fetchMessages() {
              axios.get('/messages').then(response => {
                  this.messages = response.data;
              });
          },

          addMessage(message) {
              this.messages.push(message);

              axios.post('/messages', message).then(response => {
                  console.log(response.data);
              });
          }
          likeTip(id){
            alert(id);
          }
      }
  }
  );

 
