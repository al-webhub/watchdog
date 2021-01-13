<template>
  <div class="wrapper">
    <vue-scroll-progress-bar backgroundColor="red" height=".25rem" />
    <div class="md-layout header-nav">
      <md-menu>
        <md-bottom-bar md-type="fixed" class="menu-components-wrapper">
          <md-bottom-bar-item class="menu-components-item" to="#top"  >Home</md-bottom-bar-item>
          <md-bottom-bar-item class="menu-components-item" to="#about">About</md-bottom-bar-item>
          <md-bottom-bar-item class="menu-components-item" to="#examples">Examples</md-bottom-bar-item>
          <md-bottom-bar-item class="menu-components-item" to="#features">Features</md-bottom-bar-item>
          <md-bottom-bar-item class="menu-components-item" to="#insights">Insights</md-bottom-bar-item>
          <md-bottom-bar-item class="menu-components-item" to="#contacts">Contacts</md-bottom-bar-item>
          <md-bottom-bar-item class="menu-components-item menu-last-item" id="login-link" to="/login">Login</md-bottom-bar-item>
        </md-bottom-bar>
      </md-menu>
    </div>
    <div class="md-layout section-normal test_bg section" id="top">
      <div class="md-layout-item">
        <vue-particles
                color="#dedede"
                :particleOpacity="0.1"
                :particlesNumber="200"
                shapeType="circle"
                :particleSize="1"
                linesColor="#d9534f"
                :linesWidth="1"
                :lineLinked="true"
                :lineOpacity="0.4"
                :linesDistance="250"
                :moveSpeed="3"
                :hoverEffect="true"
                hoverMode="grab"
                :clickEffect="true"
                clickMode="push"
        >
        </vue-particles>
        <div class="top-container " >
          <div class="side">
            <h1 class="main-headline">
              Watchdog
            </h1>
            <h4  class="main-subheadline">Monitor and audit web performance.</h4>
            <h4  class="main-subheadline">
              Make meaningful improvements where it matters.
            </h4>
            <md-button class="btn-outline-white" to="#about">
              Discover
            </md-button>
          </div>
        </div>
      </div>
    </div>
    <div class="md-layout first-section test_bg section" id="about">
      <div class="md-layout-item ">
        <vue-particles
          color="#dedede"
          :particleOpacity="0.1"
          :particlesNumber="200"
          shapeType="circle"
          :particleSize="1"
          linesColor="#d9534f"
          :linesWidth="1"
          :lineLinked="true"
          :lineOpacity="0.4"
          :linesDistance="250"
          :moveSpeed="3"
          :hoverEffect="true"
          hoverMode="grab"
          :clickEffect="true"
          clickMode="push"
        >
        </vue-particles>
      </div>
    </div>
    <div class="md-layout section" id="examples">
      <div class="md-layout-item section-normal">
        Examples
      </div>
    </div>
    <div class="md-layout section" id="features">
      <div
        class="md-layout-item section-normal"
        style="background-color: orangered"
      >
        Features
      </div>
    </div>
    <div class="md-layout section" id="insights">
      <div
              class="md-layout-item section-normal"
              style="background-color: yellow"
      >
        Insights
      </div>
    </div>
    <div class="md-layout section" id="contacts">
      <div
              class="md-layout-item section-normal"
              style="background-color: deepskyblue"
      >
        Contacts
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      subheaders_visible: false
    };
  },
  components: {  },
  methods: {
    show_subtitles: function () {
      this.subheaders_visible = true;
    },
    isInViewPort: function (element) {
      if (elem.length > 0) {
        let distance = elem.getBoundingClientRect();
        return (
                distance.top >= 0 &&
                distance.left >= 0 &&
                distance.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                distance.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
      }
      return false;
    }
  },
  mounted() {
    window.addEventListener('scroll', function (event) {
        let sections = document.querySelectorAll('.section');
        let in_viewport = false;
        let viewport_id = false;
        for (const section of sections) {
          let id = section.id;

          let element = document.querySelector('#'+id);
          console.log(document.visibilityState(element));
          // let distance = element.getBoundingClientRect();
          // console.log('TOP: '+distance.top +' --->LEFT: '+distance.left);
          // var rect = el.getBoundingClientRect();
          // var elemTop = rect.top;
          // var elemBottom = rect.bottom;
          //
          // // Only completely visible elements return true:
          // var isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
          // // Partially visible elements return true:
          // //isVisible = elemTop < window.innerHeight && elemBottom >= 0;
          // return isVisible;
        }

    }, false);
  }
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
  background-color: #00e676;
}

.test_bg {
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

/* Common styles */
.btn-outline-white {
  border: 1px solid white !important;
}

</style>
