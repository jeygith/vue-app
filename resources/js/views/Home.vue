<template>
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="message" v-for="status in statuses">
                    <div class="message-header">
                        <p>
                            {{status.user.name}} said
                        </p>
                        <p>{{status.created_at | ago}}</p>
                    </div>
                    <div class="message-body" v-text="status.body">

                    </div>
                </div>

                <!--Add to stream form-->
                <add-to-stream @completed="addStatus"></add-to-stream>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import Status from "../models/Status";
    import AddToStream from "../components/AddToStream";

    export default {
        components: {
            AddToStream
        },
        data() {
            return {
                statuses: []
            }
        },

        filters: {
            ago(date) {
                return moment(date).fromNow();
            }
        },

        created() {
            console.log('Component mounted.');

            Status.all(statuses => this.statuses = statuses);
        },

        methods: {
            postedOn(status) {
                return moment(status.created_at).fromNow();
            },
            addStatus(status) {
                this.statuses.unshift(status);
                console.log('your status has been added to the stream');
            }
        }
    }
</script>
