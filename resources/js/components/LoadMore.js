import throttle from 'lodash';

export default {

    props: {
        container: {}
    },
    mounted() {
        window.addEventListener('scroll', this.loadMoreResults)
    },

    methods: {
        loadMore: throttle(function (e) {
            if (this.shouldLoadMore()) {
                this.$emit('ready');
            }
        }, 300),

        shouldLoadMore() {
            let containerHeight = $(this.container).height();
        }
    }
}
