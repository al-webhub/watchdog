<template>
    <div class="wrapper">
        <frontend-navigation></frontend-navigation>
        <frontend-content></frontend-content>
    </div>
</template>

<script>
    import FrontendContent from "./FrontendContent.vue";
    import FrontendNavigation from "./FrontendNavigation.vue";
    export default {
        components: {
            FrontendContent,
            FrontendNavigation
        },
        name: "FrontendLayout"
    }
</script>

<style>
    /* Navigation */




    .section-normal {
        height: 100vh;
    }

    .section {
        background-color: #20272d;
    }




    /* Common styles */
    .btn-outline-white {
        border: 1px solid white !important;
    }

    .white-text-custom {
        color: white !important;
    }

    .centered-headline-margin {
        text-align: center;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .red {
        color: red !important;
    }

    .orange {
        color: orange !important;
    }

    .green {
        color: lawngreen !important;
    }
</style>
