<template>

  <div class="content base_content" :style="bgImage" >
    <vue-particles
            color="#dedede"
            :particleOpacity="0.7"
            :particlesNumber="180"
            shapeType="circle"
            :particleSize="4"
            linesColor="#dedede"
            :linesWidth="1"
            :lineLinked="true"
            :lineOpacity="0.4"
            :linesDistance="150"
            :moveSpeed="3"
            :hoverEffect="true"
            hoverMode="grab"
            :clickEffect="true"
            clickMode="push"
    >

    </vue-particles>
    <div class="md-layout md-alignment-bottom-center form_position">
      <div class="md-layout-item md-lay md-medium-size-100 md-size-33 login_form_padding ">
        <form @submit.prevent="submit">
          <md-card>
            <md-card-header data-background-color="red">
              <h4 class="title">{{$t(`auth.login_form_headline`)}}</h4>
              <p class="category"></p>
            </md-card-header>
            <md-card-content>
              <div class="md-layout">
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>{{$t(`auth.email`)}}</label>
                    <md-input v-model="form.email" type="email"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>{{$t(`auth.password`)}}</label>
                    <md-input v-model="form.password" type="password"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-size-100 text-right">
                  <md-button
                    @click="$router.push('register')"
                    class="md-raised md-danger pull-left"
                    >{{$t(`auth.register_button_text`)}}</md-button
                  >
                  <md-button type="submit" class="md-raised md-danger">{{$t(`auth.login_button_text`)}}</md-button>
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
      this.signIn(this.form);
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
.login_form_padding {
  margin-top: 10%;
}
.content {
  min-height: 100vh;
}
.form_position {
  position: absolute;
  top: 0.1rem;
  left: auto;
  width: 100%;
}
.base_content::-webkit-scrollbar {
  display: none;
}
.base_content {
  overflow: hidden;
}
</style>
