/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */




 
 require('./components/App');
 import VueChatScroll from 'vue-chat-scroll';
 import VueTimeago from 'vue-timeago';
 Vue.use(VueChatScroll);
 Vue.component('chat-room' , require('./components/laravel-video-chat/ChatRoom.vue'));
 Vue.component('group-chat-room', require('./components/laravel-video-chat/GroupChatRoom.vue'));
 Vue.component('video-section' , require('./components/laravel-video-chat/VideoSection.vue'));
 Vue.component('file-preview' , require('./components/laravel-video-chat/FilePreview.vue'));
 
 Vue.use(VueTimeago, {
     name: 'timeago', // component name, `timeago` by default
     locale: 'en-US',
     locales: {
         'en-US': require('vue-timeago/locales/en-US.json')
     }
 })


const io = require('socket.io')(process.env.PORT || 3000);

const arrUserInfo = [];

io.on('connection', socket => {
    socket.on('NGUOI_DUNG_DANG_KY', user => {
        const isExist = arrUserInfo.some(e => e.ten === user.ten);
        socket.peerId = user.peerId;
        if (isExist) return socket.emit('DANG_KY_THAT_BAT');
        arrUserInfo.push(user);
        socket.emit('DANH_SACH_ONLINE', arrUserInfo);
        socket.broadcast.emit('CO_NGUOI_DUNG_MOI', user);
    });

    socket.on('disconnect', () => {
        const index = arrUserInfo.findIndex(user => user.peerId === socket.peerId);
        arrUserInfo.splice(index, 1);
        io.emit('AI_DO_NGAT_KET_NOI', socket.peerId);
    });
});
