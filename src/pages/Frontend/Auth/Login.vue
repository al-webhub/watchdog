<template>
  <div class="content base_content md-layout" :style="bgImage">
<!--    <vue-particles-->
<!--      color="#dedede"-->
<!--      :particleOpacity="0.1"-->
<!--      :particlesNumber="200"-->
<!--      shapeType="circle"-->
<!--      :particleSize="1"-->
<!--      linesColor="#d9534f"-->
<!--      :linesWidth="1"-->
<!--      :lineLinked="true"-->
<!--      :lineOpacity="0.4"-->
<!--      :linesDistance="250"-->
<!--      :moveSpeed="3"-->
<!--      :hoverEffect="true"-->
<!--      hoverMode="grab"-->
<!--      :clickEffect="true"-->
<!--      clickMode="push"-->
<!--    >-->
<!--    </vue-particles>-->
    <div class="md-layout md-alignment-bottom-center form_position ">
      <div class="md-layout-item md-lay md-medium-size-100 md-size-33  ">
        <form @submit.prevent="submit" class="transparent">
          <md-card>
            <h2 class="not_transparent text-center " style="color: white">
              Watchdog
            </h2>
            <md-card-content class="not_transparent">
              <div class="md-layout">
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>{{ $t(`auth.email`) }}</label>
                    <md-input
                      v-model="form.email"
                      type="email"
                      class="caret_color_red"
                    ></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>{{ $t(`auth.password`) }}</label>
                    <md-input
                      class="caret_color_red"
                      v-model="form.password"
                      type="password"
                    ></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-size-100 ">
                  <md-button
                    type="submit"
                    style="background-color: transparent !important;border: 1px solid white;"
                    class="md-raised btn-transparent md-glowing-red active"
                    >{{ $t(`auth.login_button_text`) }}</md-button
                  >
                </div>
              </div>
            </md-card-content>
          </md-card>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapGetters } from "vuex";

import Vue from "vue";

export default {
  name: "Login",
  components: {},
  props: {
    backgroundImage: {
      type: String,
      default: require("@/assets/img/bg-login.jpg")
    }
  },
  methods: {
    ...mapActions({
      signIn: "auth/signIn"
    }),
    submit() {
      if (this.form.email.length === 0 || this.form.password.length === 0) {
        let message = '<span style="color:white">'+this.$t(`auth.errors.empty`)+'</span>';
        Vue.swal({
          title: message,
          background: 'transparent',
          confirmButtonColor: 'transparent',
        });
      } else {
        this.signIn(this.form);
      }
    }
  },
  data() {
    return {
      form: {
        email: "",
        password: ""
      }
    };
  },
  computed: {
    ...mapGetters({
      authenticated: "auth/authenticated",
      user: "auth/getUser"
    }),
    bgImage() {
      return {
        backgroundImage: `url(${this.backgroundImage})`
      };
    }
  }
};
</script>

<style>
.content {
  min-height: 100vh;
}
.form_position {
  position: absolute;
  top: 5rem;
  left: auto;
  width: 100%;
}

.transparent {
  visibility: hidden;
}
.not_transparent {
  visibility: visible !important;
}
html,
body {
  margin: 0;
  padding: 0;
  height: 100%;
  width: 100%;
}
.caret_color_red {
  caret-color: #f44336;
  -webkit-text-fill-color: white !important;
}
</style>
