<template>
    <div v-for="message in messages">
        <message @del="id => $emit('del', id)"
               @upd="message => $emit('upd', message)"
               :message="message"
               :key="message.id"
        ></message>
    </div>
</template>

<script>
import Message from './Message.vue'
export default {
    name: 'Messages',
    components: {Message},
    props: ['messages'],
};
</script>

<style scoped>

</style>
