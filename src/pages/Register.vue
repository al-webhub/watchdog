<template>
  <div class="content">
    <div class="md-layout md-alignment-bottom-center ">
      <div class="md-layout-item md-lay md-medium-size-100 md-size-33 login_form_padding ">
        <form @submit.prevent="submit">
          <md-card>
            <md-card-header >
              <h4 class="title">Register</h4>
              <p class="category"></p>
            </md-card-header>
            <md-card-content>
              <div class="md-layout">
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>Name</label>
                    <md-input v-model="form.name" type="name"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>Email</label>
                    <md-input v-model="form.email" type="email"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>Password</label>
                    <md-input v-model="form.password" type="password"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>Repeat password</label>
                    <md-input v-model="form.password_confirmation" type="password"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-size-100 text-right">
                  <md-button @click="$router.push('login')" class="md-raised md-danger pull-left">Login</md-button>
                  <md-button type="submit" class="md-raised md-danger">Register</md-button>
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
    })
  }
};
</script>

<style>
.login_form_padding {
  margin-top: 10%;
}
</style>
