<template>
    <div class="mb-10 message-form px-6">
        <textarea placeholder="What's happening?"
                  class="w-full border-none resize-none focus:border-none"
                  v-model="content"
        ></textarea>

        <div class="flex justify-end">
            <button class="message-btn"
                    @click="addMessage"
                    :style="{opacity: content.length ? '1' : '0.5'}"
            >Send</button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'MessageForm',

    data() {
        return {
            content: ''
        }
    },

    methods: {
        addMessage()
        {
            this.$emit('message', this.content)
            this.content = ''
        }
    }
};
</script>

<style>
    .twitter-form textarea:focus { border: 0; outline: none; box-shadow: none }
    .twitter-form textarea { font-size: 20px }

    .message-btn {
        background-color: rgb(29, 155, 240);
        border-bottom-left-radius: 9999px;border-bottom-right-radius: 9999px;border-top-left-radius: 9999px;border-top-right-radius: 9999px;
        font-weight: bold;
        color: white;
        padding-left: 1rem;
        padding-right: 1rem;
        min-height: 2.25rem;
        min-width: 2.25rem;
    }

    .message-btn:hover {
        background-color: #428AD2;
    }
</style>
