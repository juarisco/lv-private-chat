<template>
    <div class="card card-default chat-box">
        <div class="card-header">
            <b :class="{'text-danger':session_block}">
                {{ friend.name }}
                <span v-if="session_block">(Blocked)</span>
            </b>

            <!-- Close button -->
            <a href="" @click.prevent="close">
                <i class="fa fa-times float-right"></i>
            </a>

            <!-- Options-->
            <div class="dropdown mr-3 float-right">
                <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" @click.prevent="unblock" v-if="session_block">UnBlock</a>
                    <a class="dropdown-item" href="#" @click.prevent="block" v-else>Block</a>
                    <a class="dropdown-item" href="#" @click.prevent="clear">Clear Chat</a>
                </div>
            </div>

        </div>
        <div class="card-body" v-chat-scroll>
            <p class="card-text" v-for="chat in chats" :key="chat.message">
                {{chat.message}}
            </p>
        </div>
        <form class="card-footer" @submit.prevent="send">
            <div class="form-group">
                <input type="text"
                       class="form-control"
                       placeholder="write your message here"
                       :disabled="session_block"
                       v-model="message"
                >
            </div>
        </form>

    </div>
</template>

<script>
    export default {
        props: ['friend'],
        data() {
            return {
                chats: [],
                message: null,
                session_block: false
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
        },
        methods: {
            send() {
                if (this.message) {
                    this.chats.push(this.message);
                    axios.post(`/send/${this.friend.session.id}}`, {
                        content: this.message,
                        to_user: this.friend.id,
                    });
                    this.message = null
                }
            },
            close() {
                this.$emit('close')
            },
            clear() {
                this.chats = []
            },
            block() {
                this.session_block = true
            },
            unblock() {
                this.session_block = false
            }
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
