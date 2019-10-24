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

        >
            <div>
                <h1 class="text text-2xl">Have a Question?</h1>

                <form
                    autocomplete="off"
                    class="p-8 lg:w-1/2 md:mx-auto"
                    @submit.prevent="contactSupport"
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
                            required>
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

            };
        }
    }
</script>
