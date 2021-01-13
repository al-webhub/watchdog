<template>
  <div class="content base_content" :style="bgImage">
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
    <div class="md-layout md-alignment-top-center content_sect " style="margin-top: 1vh">
      <div class="md-layout-item md-lay md-size-100  ">
        <div class="not_found_container">
          <div class="md-display-4 headline_404">
            <transition name="block" mode="out-in">
              <md-button
                      v-if="back_visible"
                      v-on:click="$router.back()"
                      style="background-color: transparent !important;font-size: 0.4em"
                      class="md-raised btn-transparent"
              >
                <md-icon style="font-size: 1em !important; margin-right: 15px;">keyboard_backspace</md-icon>Back</md-button>
            </transition>
          </div>
          <div class="md-display-4 headline_  404 middle_block" >
            <transition name="block" mode="out-in">
              <div v-if="content_visible" style="margin: auto; color: white!important">404</div>
            </transition>
          </div>
          <div class="md-display-4 headline_404 " >
            <transition name="block" mode="slideLeft">
              <md-button
                      v-if="home_visible"
                      to="/"
                      style="background-color: transparent !important; font-size: 0.4em; float: right"
                      class="md-raised btn-transparent"
              >
                Home <md-icon style="font-size: 1em !important; margin-left: 15px;">arrow_right_alt</md-icon></md-button>
            </transition>
          </div>
        </div>
      </div>
      <div class="md-layout md-lay md-size-100">
        <transition name="block" mode="slideLeft">
          <div v-if="subheader_visible" class="md-layout-item md-alignment-bottom-center md-lay md-size-100  ">
            <p class="text-center" style="color: white!important">Page not found</p>
          </div>
        </transition>

      </div>
    </div>
  </div>
</template>

<script>
  import Vue from "vue";

  export default {
    name: "Login",
    data() {
      return {
        startTyping: false,
        home_visible: false,
        back_visible: false,
        content_visible: false,
        subheader_visible: false
      }
    },
    props: {
      backgroundImage: {
        type: String,
        default: require("@/assets/img/bg-login.jpg")
      }
    },
    methods: {

    },
    computed: {
      bgImage() {
        return {
          backgroundImage: `url(${this.backgroundImage})`
        };
      }
    },
    mounted() {
      const delay = t => new Promise(resolve => setTimeout(resolve, t));

      delay(500).then(() => this.content_visible = true);
      delay(1000).then(() => this.subheader_visible = true);
      delay(1500).then(() => this.back_visible = true);
      delay(1500).then(() => this.home_visible = true);
    }
  };
</script>

<style scoped>
  .block-enter {
    Opacity: 0;
  }
  .block-enter-active {
    transition : opacity 1s;
  }
  .block-leave {
  }
  .block-leave-active {
    transition: opacity 1s;
    Opacity: 0;
  }

  .middle_block {
    text-align: center;
  }

  .not_found_container {
    display: flex;
  }

  #particles-js {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
  }

  .content_sect {
    z-index: 99999;
    position: relative;
    top:40vh;
    left: auto;
    width: 100%;
  }

  .content {
    min-height: 100vh;
  }

  .headline_404 {
    color: white !important;
    flex: 1;
  }
  .base_content {
    width: auto;
  }
  html,
  body {
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
  }
  .base_content {
    height: 100vh;
    width: 100vw;
    overflow: hidden;
  }
</style>
