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
            <md-button
                    v-if="back_visible"
                    v-on:click="$router.back()"
                    style="background-color: transparent !important;border: 1px solid white; font-size: 0.4em"
                    class="md-raised btn-transparent"
            >
              <md-icon style="font-size: 1em !important; margin-right: 15px;">keyboard_backspace</md-icon>Back</md-button>
          </div>
          <div class="md-display-4 headline_404 middle_block" >
            <div style="margin: auto;">404</div>
          </div>
          <div class="md-display-4 headline_404 " >
            <md-button
                    v-if="home_visible"
                    v-on:click="$router.back()"
                    style="background-color: transparent !important;border: 1px solid white; font-size: 0.4em; float: right"
                    class="md-raised btn-transparent"
            >
              Home <md-icon style="font-size: 1em !important; margin-left: 15px;">arrow_right_alt</md-icon></md-button>
          </div>
        </div>
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
        back_visible: false
      }
    },
    props: {
      backgroundImage: {
        type: String,
        default: require("@/assets/img/bg-login.jpg")
      }
    },
    methods: {
      startTypingSubheader: function () {
        //document.querySelectorAll(".typed-cursor")[0].style.display = "none";
        this.startTyping = true;
      }
    },
    computed: {
      bgImage() {
        return {
          backgroundImage: `url(${this.backgroundImage})`
        };
      }
    }
  };
</script>

<style scoped>
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
