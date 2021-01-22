<template>
  <div class="content" :style="bgImage">
    <div class="md-layout md-alignment-bottom-center ">
      <div class="md-layout-item md-lay md-medium-size-100 md-size-33 login_form_padding ">
        <form @submit.prevent="submit">
          <md-card>
            <md-card-header data-background-color="red">
              <h4 class="title">{{$t(`auth.register_form_headline`)}}</h4>
              <p class="category"></p>
            </md-card-header>
            <md-card-content>
              <div class="md-layout">
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>{{$t(`auth.name`)}}</label>
                    <md-input v-model="form.name" type="name"></md-input>
                  </md-field>
                </div>
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
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>{{$t(`auth.repeat_password`)}}</label>
                    <md-input v-model="form.password_confirmation" type="password"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-size-100 text-right">
                  <md-button @click="$router.push('login')" class="md-raised md-danger pull-left">{{$t(`auth.login_button_text`)}}</md-button>
                  <md-button type="submit" class="md-raised md-danger">{{$t(`auth.register_button_text`)}}</md-button>
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
  methods: {
    ...mapActions({
      register: "auth/register"
    }),
    submit() {
      this.register(this.form);
    }
  },
  props: {
    backgroundImage: {
      type: String,
      default: require("@/assets/img/bg-login.jpg")
    }
  },
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
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
  },
  created() {
    if (this.authenticated) {
      this.$router.push("dashboard");
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
</style>
