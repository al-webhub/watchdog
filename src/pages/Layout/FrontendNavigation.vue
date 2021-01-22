<template>
    <div class="md-layout header-nav">
        <md-menu>
            <md-bottom-bar md-type="fixed" class="menu-components-wrapper ">
                <md-bottom-bar-item class="menu-components-item "  to="/" exact active-class="active_nav"
                >Home</md-bottom-bar-item
                >
                <md-bottom-bar-item class="menu-components-item" to="/about" active-class="active_nav"
                >About</md-bottom-bar-item
                >
                <md-bottom-bar-item class="menu-components-item" to="/examples" active-class="active_nav"
                >Examples</md-bottom-bar-item
                >
                <md-bottom-bar-item class="menu-components-item" to="/features" active-class="active_nav"
                >Features</md-bottom-bar-item
                >
                <md-bottom-bar-item class="menu-components-item " to="/contacts" active-class="active_nav"
                >Contacts</md-bottom-bar-item
                >
                <md-bottom-bar-item
                        class="menu-components-item menu-last-item"
                        id="login-link"
                        to="/login"
                >Login</md-bottom-bar-item
                >
            </md-bottom-bar>
        </md-menu>
    </div>
</template>

<script>
    export default {
        name: "FrontendNavigation"
    }
</script>

<style scoped>


    .header-nav {
        position: fixed;
        left: 0;
        top: auto;
        bottom: 3px;
        z-index: 100;
        height: 3rem;
        padding: 0;
        border: 1px solid white;
    }

    .menu-components-wrapper {
        height: 3rem;
        width: 100vw;
    }

    .md-bottom-bar .md-bottom-bar-item {
        height: 3rem !important;
    }

    .menu-components-item {
        border: 1px solid white;
    }




    .md-theme-default {
        background-color: transparent !important;
    }

    .md-theme-default:hover {
        background-color: transparent !important;
    }

    .md-bottom-bar.md-type-fixed .md-bottom-bar-item {
        max-width: 100% !important;
    }


</style>
