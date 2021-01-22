<template>
  <div  class="md-layout section-normal  section" id="top">
    <div class="md-layout-item">
      <div class="top-container ">
        <div class="side">
          <h1 class="main-headline">
            Watchdog
          </h1>
          <h4 class="main-subheadline">Monitor and audit web performance.</h4>
          <h4 class="main-subheadline">
            Make meaningful improvements where it matters.
          </h4>
          <md-button class="btn-outline-white md-glowing-red" to="/about">
            Discover
          </md-button>
        </div>
      </div>
      <img class="main-banner" src="@/assets/img/laptop.png" alt="" />
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
  /* Top container styles */
  .top-container {
    position: absolute;
    top: 15%;
    left: 15%;
  }

  .main-headline {
    color: white;
  }

  .main-subheadline {
    color: white;
  }

  .main-banner {
    position: absolute;
    top: 10%;
    right: 10%;
    width: 50%;
    height: 70%;
  }

</style>
