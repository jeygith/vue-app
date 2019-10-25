<template>
    <div>
        <a class="text-transparent-50 hover:text-white"
           @click="$modal.show('contact-support-modal')"
        >
            Support
        </a>

        <modal
            name="contact-support-modal"
            height="auto"
            width="100%"
            :pivotY="1"
            classes="bg-white rounded-none shadow-inner"

        >
            <div class="py-6 container mx-auto">
                <h1 class="text-center text-2xl">Have a Question?</h1>

                <form
                    autocomplete="off"
                    class="p-8 lg:w-1/2 md:mx-auto"
                    @submit.prevent="contactSupport"
                    @keydown="submitted=false"
                >

                    <div class="control">
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="input is-minimal"
                            placeholder="What's your name?"
                            v-model="message.name"
                            @keydown="delete errors.name"
                        >
                        <span
                            class="text-xs text-red-500 pt-2"
                            v-text="errors.name[0]"
                            v-if="errors.name"
                        ></span>
                    </div>
                    <div class="control">
                        <input
                            type="text"
                            name="email"
                            id="email"
                            class="input is-minimal"
                            placeholder="Which email address should we respond to?"
                            v-model="message.email"
                            @keydown="delete errors.email"
                            required>
                        <span
                            class="text-xs text-red-500 pt-2"
                            v-text="errors.email[0]"
                            v-if="errors.email"
                        ></span>
                    </div>
                    <div class="control">
                        <textarea
                            name="question"
                            id="body"
                            class="textarea is-minimal"
                            data-autosize
                            required
                            placeholder="What's your question?"
                            v-model="message.question"
                            @keydown="delete errors.question"
                        ></textarea>
                        <span
                            class="text-xs text-red-500 pt-2"
                            v-text="errors.question[0]"
                            v-if="errors.question"
                        ></span>
                    </div>
                    <div class="control">
                        <input
                            name="veirfication"
                            id="verification"
                            class="input is-minimal"
                            placeholder="What is 1 + 4?"
                            v-model="message.verification"
                            required
                            type="text"
                            @keydown="delete errors.verification"
                        >
                        <span
                            class="text-xs text-red-500 pt-2"
                            v-text="errors.verification[0]"
                            v-if="errors.verification"
                        ></span>
                    </div>

                    <div class="flex justify-end">
                        <a
                            class="button is-default mr-4 py-2 rounded-full"
                            @click="cancel">Cancel</a>
                        <button
                            class="button bg-blue-500 hover:bg-blue-700 hover:text-white text-white py-1 rounded-full"
                            type="submit"
                            :disabled="submitted"
                        >Send
                        </button>
                    </div>
                </form>
            </div>

        </modal>
    </div>


</template>

<script>
    export default {
        data() {
            return {
                message: {},
                errors: {},
                submitted: false

            };
        },

        methods: {

            cancel() {
                this.$modal.hide('contact-support-modal');
                this.resetForm();
            },
            contactSupport() {
                this.submitted = true;

                axios
                    .post('/contact', this.message)
                    .then(() => {
                        this.$modal.hide('contact-support-modal')
                        this.resetForm();
                        swal('Thanks! We will be in touch soon.')
                    })
                    .catch(errors => this.errors = errors.response.data.errors)
            },
            resetForm() {
                this.message = {};
                this.submitted = false;
            }
        }
    }
</script>
