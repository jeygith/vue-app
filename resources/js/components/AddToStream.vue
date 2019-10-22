<template>
    <div class="message">
        <div class="message-header">
            Push to the stream...
        </div>
        <div class="message-body">
            <form @submit.prevent="onSubmit" @keydown="form.errors.clear()">
                <p class="control">
                    <textarea name="" id="" cols="30" rows="10" class="textarea"
                              v-model="form.body">

                    </textarea>
                    <span class="help is-danger"
                          v-text="form.errors.get('body')">
                    </span>
                </p>


                <button class="button is-primary" :disabled="form.errors.any()">
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                form: new Form({
                    body: ''
                })
            }
        },
        methods: {
            onSubmit() {
                this.form
                    .post('/statuses')
                    .then(status => this.$emit('completed', status))
                    .catch(errors => console.log(errors));

            }
        }
    }
</script>
