<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card card-default">
                    <div class="card-header">Private Chat App</div>
                    <ul class="list-group">
                        <li class="list-group-item"
                            v-for="friend in friends"
                            :key="friend.id">
                            <a href="" @click.prevent="">{{ friend.name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <message-component v-if="open" @close="close"></message-component>
            </div>
        </div>
    </div>
</template>

<script>
    import MessageComponent from "./MessageComponent";

    export default {
        components: {MessageComponent},
        data() {
            return {
                open: true,
                friends: []
            }
        },
        methods: {
            close() {
                this.open = false
            },
            getFriends() {
                axios.post('/getFriends').then((res) => {
                    this.friends = res.data
                })
            }
        },
        created() {
            this.getFriends()
        },

    }
</script>
