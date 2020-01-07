<template>
    <div class="card card-default chat-box">
        <div class="card-header">
            Chats
            <a href="" @click.prevent="close">
                <i class="fa fa-times float-right"></i>
            </a>
        </div>
        <div class="card-body" v-chat-scroll>
            <p class="card-text" v-for="chat in chats" :key="chat.message">
                {{chat.message}}
            </p>
        </div>
        <form class="card-footer" @submit.prevent="send">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="write your message here">
            </div>
        </form>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                chats: [],
            }
        },
        methods: {
            send() {
                console.log('yeah!')
            },
            close() {
                this.$emit('close')
            }
        },
        created() {
            this.chats.push(
                {
                    message: 'Hey'
                },
                {
                    message: 'How are u?'
                },
                {
                    message: 'Im at bottom'
                }
            )
        }
    }
</script>

<style>
    .chat-box {
        height: 400px;
    }

    .card-body {
        overflow-y: scroll;
    }
</style>
