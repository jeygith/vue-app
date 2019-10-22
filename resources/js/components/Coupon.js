export default {
    props: ['code'],
    template: `<input type="text" :value="code" @input="updateCode($event.target.value)" ref="input">`

    ,
    data(){
        return {
            invalids: ['ALLFREE', 'SOMETHINGELSE']
        }
    },
    methods: {
        updateCode(code) {
            // validation

            if (this.invalids.includes(code)) {
                alert('This code is no longer valid. Sorry');

                this.$refs.input.value = code = '';
            }


            this.$emit('input', code);
        }
    }
}
