<template>
  <vue-page-transition >
    <router-view/>
  </vue-page-transition>
</template>
<script>
export default {

};
</script>

<style>
  :root {
    /*--overlay-bg: #c00006 !important;*/
    --transition-duration: 0.35s !important;
  }

  .overlay-left,  .overlay-right,  .overlay-top,  .overlay-bottom   {
    background: #20272d !important;
    z-index: 99999 !important;
  }

</style>
