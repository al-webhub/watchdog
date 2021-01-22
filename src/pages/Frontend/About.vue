<template>
  <div class="md-layout section-normal  section">
    <div class="md-layout-item ">
      <div class="md-layout-item centered-headline-margin " >
        <span class="md-display-2  white-text-custom">HOW IT WORKS</span>
        <br>
        <span class="md-subheading white-text-custom">Quick setup with nothing to download or install</span>
      </div>
      <div class="md-layout about-container">
        <div id="first" class="md-layout-item">
          <md-card class="btn-outline-white">
            <md-card-media class="text-center">
              <md-icon class="md-size-5x white-text-custom">link</md-icon>
            </md-card-media>
            <md-card-content class="white-text-custom text-center">
              <span class="md-headline">Add URL's in dashboard</span>
            </md-card-content>
          </md-card>
        </div>
        <div id="second" class="md-layout-item">
          <md-card class="btn-outline-white">
            <md-card-media class="text-center">
              <md-icon class="md-size-5x white-text-custom">speed</md-icon>
            </md-card-media>
            <md-card-content class="white-text-custom text-center">
              <span class="md-headline">Trigger Scans</span>
            </md-card-content>
          </md-card>
        </div>
        <div id="third" class="md-layout-item ">
          <md-card class="btn-outline-white">
            <md-card-media class="text-center">
              <md-icon class="md-size-5x white-text-custom"
              >analytics</md-icon
              >
            </md-card-media>
            <md-card-content class="white-text-custom text-center">
              <span class="md-headline">Analyse Results</span>
            </md-card-content>
          </md-card>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
};
</script>

<style scoped>
/* Navigation */
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

.first-section {
  height: 100vh;
}

.section-normal {
  height: 100vh;
}

.section {
  background-color: #20272d;
}



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

.about-container2 {
  margin-top: 12vh;
  position: relative;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* Examples section */
.table-centered {
  margin: 0 auto;
}

.flat-list {
  list-style-type: none;
  margin: 0;
  padding: 0;

  display: inline-block;
  *display: inline;
  zoom: 1
}

table, th, td {
  border: 1px solid white !important;
}

.table-footer-text {
  width: 55vw;
  margin: 1rem auto 0 auto;
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
