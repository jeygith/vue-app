<template>
    <div @mouseover="active = true" @mouseout="active = false">
        <a href="/series">
            Series
        </a>

        <portal to="nav-after">
            <div v-show="active"
                 @mouseover="active = true"
                 @mouseout="active = false"
                 class="absolute w-full z-10 bg-white"
            >
                <div class="container mx-auto py-8">nav after</div>
            </div>
        </portal>
    </div>
</template>

<script>
    export default {
        data() {
            return {active: false}
        }
    }
</script>
