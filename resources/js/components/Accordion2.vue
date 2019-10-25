<template>
    <div>
        <accordion-item
            v-for="(item, index) in items"
            :item="item"
            :key="index"
            :is-open="activeItemIndex == index"
            @toggled="onToggle"
        ></accordion-item>
    </div>

</template>

<script>
    import AccordionItem from "./AccordionItem";

    export default {
        props: ['items'],

        data() {
            return {
                activeItemIndex: null
            }
        },
        components: {AccordionItem},

        methods: {
            onToggle(index) {
                if (this.activeItemIndex == index) {
                    this.activeItemIndex = null;
                    return;
                }
                console.log('accordion item with an index of: ', index);
                this.activeItemIndex = index;
            }
        }
    };
</script>
