<template>
    <div style="max-width: 600px" class="mx-auto">
        <message-form @reload="reloadMessages"
                      @message="message => addMessage(message)"
        ></message-form>

        <messages @reload="reloadMessages"
                  @del="id => deleteMessage(id)"
                  @upd="message => updateMessage(message)"
                  :messages="messages"
        ></messages>
    </div>
</template>

<script>
import MessageForm from './MessageForm.vue';
import Messages from './Messages.vue';

export default {
    name: 'App',

    data() {
        return {
            messages: []
        }
    },

    components: {
        Messages,
        MessageForm
    },

    methods: {
        reloadMessages()
        {
            this.messages.length = 0

            getMessagesJson().then(messages => {
                messages.forEach(message => this.messages.unshift(message))
            })
        },

        addMessage(message)
        {
            fetch('/messages', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json', // errors in json
                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    content: message
                }),
            }).then(result => result.text())
            .then(data => {
                this.messages.unshift(JSON.parse(data))
            })
        },

        updateMessage(message)
        {
            fetch('/messages/' + message.id, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json', // errors in json
                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    content: message.content
                }),
            }).then(result => result.text())
            .then(data => {
                if (!data) return
                let index = this.messages.findIndex(t => t.id === message.id)
                this.messages[index].content = message.content
            })
        },

        deleteMessage(id)
        {
            fetch('/messages/' + id, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json', // errors in json
                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                },
            })
            .then(response => {
                if (!response.ok) return response.json().then(error => {throw error})
                return response.json()
            })
            .then(data => {
                if (!data) return
                let index = this.messages.findIndex(t => t.id === id)
                this.messages.splice(index, 1)
            })
            .catch(error => {
                console.log(error?.message ?? error)
            })
        }

    },

    mounted() {
        this.reloadMessages()
    }
};

function getMessagesJson()
{
    return fetch('/messages', {
        method: 'GET',
    }).then(response => {
        if (!response.ok) {
            return response.json().then(error => {
                throw error
            })
        }
        return response.json()
    }).then(data => {
        return data
    }).catch(error => {
        console.log(error?.message ?? error)
    })
}
</script>

<style scoped>

</style>
