Vue.component('message',{
    props:['title','body'],
    template:`<article class="message is-primary">
        <div class="message-header">
            <p>{{title}}</p>
            <button class="delete" aria-label="delete"></button>
        </div>
        <div class="message-body">
            {{body}}
        </div>
    </article>`

})

new Vue({
    el:'#root'
})