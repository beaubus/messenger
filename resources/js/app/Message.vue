<template>
    <div class="message py-4 px-8 flex">
        <div>
           <div class="avatar"></div>
        </div>

        <div class="flex-1 pl-3">
            <div>
                <p class="text-xs">
                    <b class="mr-2 text-sm message-name">{{ message.user.name }}</b>
                    <span class="mr-4 message-date"> @{{ message.user.email.split('@')[0] }} · {{ message.created_at.replace(' after', '') }}</span>

                    <template v-if="message.user.id === user_id">
                    <span @click="is_edit = !is_edit"
                          class="cursor-pointer"
                          style="color: #4A99E9"
                    >edit</span>

                        <span @click="e => $emit('del', message.id)"
                              class="ml-2 text-red-600 cursor-pointer"
                        >delete</span>
                    </template>
                </p>
                <p v-if="!is_edit">{{ message.content }}</p>
            </div>

            <div v-if="is_edit">
                <input type="text"
                       v-model="editable_content"
                       class="border-gray-300 mr-2 my-4"
                       @keydown.enter="updateMessage"
                >
                <button @click="updateMessage"
                        class="rounded-btn bg-black text-white px-4 py-1"
                >Save</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Message',
    props: ['message'],
    data() {
        return {
            is_edit: false,
            editable_content: this.message.content,
            edit_text: '',
            user_id: 0
        }
    },

    methods:{
        updateMessage()
        {
            this.$emit('upd', {
                id: this.message.id,
                content: this.editable_content
            })

            this.is_edit = false
        }
    },

    mounted()
    {
        this.user_id = user_id
    }
};
</script>

<style>
    .message {
        border-top: 1px solid #F0F3F4;
    }

    .message:hover {
        background: #F7F7F7;
    }

    .message-name {
        font-size: 15px
    }

    .message-date {
        color: rgb(83, 100, 113);
        font-size: 15px;
    }

    .avatar {
        border-radius: 100%;
        width: 48px;
        height: 48px;
        background: #CED6DC;
    }

    .avatar:hover {
        background: #B3BABF;
    }
</style>
