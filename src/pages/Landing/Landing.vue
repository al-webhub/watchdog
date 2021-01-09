<template>
  <div class="wrapper">
    <vue-scroll-progress-bar backgroundColor="red" height=".25rem" />
    <div class="md-layout header-nav">
      <md-menu>
        <md-bottom-bar md-type="fixed" class="menu-components-wrapper">
          <md-bottom-bar-item class="menu-components-item" id="bottom-bar-item-home"  >Home</md-bottom-bar-item>
          <md-bottom-bar-item class="menu-components-item" id="bottom-bar-item-pages">About</md-bottom-bar-item>
          <md-bottom-bar-item class="menu-components-item" id="bottom-bar-item-posts">Examples</md-bottom-bar-item>
          <md-bottom-bar-item class="menu-components-item" id="bottom-bar-item-posts">Features</md-bottom-bar-item>
          <md-bottom-bar-item class="menu-components-item" id="bottom-bar-item-posts">Insights</md-bottom-bar-item>
          <md-bottom-bar-item class="menu-components-item" id="bottom-bar-item-posts">Contacts</md-bottom-bar-item>
          <md-bottom-bar-item class="menu-components-item menu-last-item" id="login-link" to="/login">Login</md-bottom-bar-item>
        </md-bottom-bar>
      </md-menu>
    </div>
    <div class="md-layout section-normal test_bg">
      <div class="md-layout-item">
        <h1 class="main-headline">
          <DecodingTextAnimation
            text="Watchdog"
            mode="type"
            typeCharacter="|"
            :probability="1"
            speed="slow"
            @decodeFinish="show_subtitles"
          ></DecodingTextAnimation>
        </h1>
        <h4 v-if="subheaders_visible" class="main-subheadline">Monitor and audit web performance.</h4>
        <h4 v-if="subheaders_visible" class="main-subheadline">
          Make meaningful improvements where it matters.
        </h4>
      </div>
    </div>
    <div class="md-layout first-section test_bg">
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
    <div class="md-layout">
      <div class="md-layout-item section-normal">
        6666
      </div>
    </div>
    <div class="md-layout">
      <div
        class="md-layout-item section-normal"
        style="background-color: orangered"
      >
        6666
      </div>
    </div>
  </div>
</template>

<script>
import { DecodingTextAnimation } from "@/components";
export default {
  data() {
    return {
      subheaders_visible: false
    };
  },
  components: { DecodingTextAnimation },
  methods: {
    show_subtitles: function () {
      this.subheaders_visible = true;
    }
  }
};
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

.main-headline {
  color: white;
  margin: 15rem 0 0 15rem;
}

.main-subheadline {
  color: white;
  margin: 0.1rem 0 0 15rem;
}

.first-section {
  height: 100vh;
  /*background-image: url('~@/assets/img/bg-login.jpg');*/
}

.section-normal {
  height: 100vh;
  background-color: #00e676;
}

.test_bg2 {
  background: linear-gradient(-45deg, #da460a, #3c5059, #3c464e, #671f05);
  background-size: 400% 400%;
  -webkit-animation: gradient 15s ease infinite;
  animation: gradient 15s ease infinite;
}

.test_bg {
  background-color: #20272d;
}

@-webkit-keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
</style>
