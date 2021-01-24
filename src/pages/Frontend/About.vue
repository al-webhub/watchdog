<template>
  <div class="md-layout section-normal section">
    <div class="md-layout-item ">
      <div class="md-layout-item centered-headline-margin ">
        <span class="md-display-2  white-text-custom"> HOW IT WORKS</span>
        <br />
        <span class="md-subheading white-text-custom"> Quick setup with nothing to download or install</span>
      </div>
      <div class="md-layout card-container">
        <div class="md-layout-item md-layout-item md-medium-size-33 md-small-size-50 md-xsmall-size-100">
          <div class="card" >
            <div class="imgBox">
              <md-icon class="md-size-4x white-text-custom ">link</md-icon>
              <span class="md-title white-text-custom">Add URL's</span>
            </div>
            <div class="content-card">
              <ul class="feature-list white-text-custom">
                <li>Up to 100 Urls Monitored</li>
                <li>Bulk url upload (dev)</li>
                <li>Easy to understand UI</li>
                <li>Full site scans based on Sitemap.xml</li>
                <li>Mobile and desktop checked</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="md-layout-item md-layout-item md-medium-size-33 md-small-size-50 md-xsmall-size-100">
          <div class="card">
            <div class="imgBox">
              <md-icon class="md-size-4x white-text-custom">speed</md-icon>
              <span class="md-title white-text-custom">Trigger Scans</span>
            </div>
            <div class="content-card ">
              <ul class="feature-list white-text-custom">
                <li>Checkrate up to 5 min</li>
                <li>Automated and on demand scans</li>
                <li>Domain monitoring (dev)</li>
                <li>SSL monitoring (dev)</li>
                <li>Uptime monitoring (dev)</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="md-layout-item md-layout-item md-medium-size-33 md-small-size-50 md-xsmall-size-100">
          <div class="card">
            <div class="imgBox">
              <md-icon class="md-size-4x white-text-custom img-icon">analytics</md-icon>
              <span class="md-title white-text-custom">Analyze results</span>
            </div>
            <div class="content-card">
              <ul class="feature-list white-text-custom">
                <li>View scores of all important pages</li>
                <li>Up to 3 years of historical data (dev)</li>
                <li>Google sheets report export (dev)</li>
                <li>Analyze new code releases or content updates</li>
              </ul>
            </div>
          </div>
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
.card-container {
  margin-top: 3rem;
}

.card-container .card {
  border-bottom: 1px solid white;
  border-left: 1px solid white;
  border-right: 1px solid white;
  margin-left: auto;
  margin-right: auto;
  position: relative;
  width: 300px;
  height: 350px;
  background: transparent;
  transition: 0.5s;
}

.card-container .card:before {
  content: '';
  position: absolute;
  top: -5px;
  left: 0;
  width: 100%;
  height: 5px;
  background: transparent;
  transform-origin: bottom;
  transform: skewX(45deg);
  transition: 0.5s;
  border: 1px solid white;
}

.card-container  .card:after {
  content: '';
  position: absolute;
  top: -5px;
  left: -5px;
  width: 5px;
  height: 50%;
  background: transparent;
  transform-origin: left;
  transform: skewY(45deg);
  transition: 0.5s;
  border-bottom: 350px solid white;
}

.card-container .card:hover {
  transform: TranslateY(-40px);
  box-shadow: 0 0 5px #F44336,
  0 0 25px #F44336,
  0 0 50px #F44336,
  0 0 200px #F44336;
}

.card-container .card .imgBox {
  position: relative;
  width: 300px;
  height: 150px;
  background: transparent;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.card-container .card .imgBox {
  margin-left: 0;
}



.card-container .card .content-card {
  position: relative;
  width: 100%;
  height: 200px;
  padding: 20px;
  color: #777;
  text-align: center;
}


.feature-list {
  text-align: left;
  padding-left: 1.4rem;
}

</style>
