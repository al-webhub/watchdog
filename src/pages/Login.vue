<template>
  <div class="content">
    <div class="md-layout md-alignment-bottom-center ">
      <div
        class="md-layout-item md-lay md-medium-size-100 md-size-33 login_form_padding "
      >
        <form @submit.prevent="submit">
          <md-card>
            <md-card-header>
              <h4 class="title">Login</h4>
              <p class="category"></p>
            </md-card-header>
            <md-card-content>
              <div class="md-layout">
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>Email</label>
                    <md-input v-model="form.email" type="email"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>Password</label>
                    <md-input
                      v-model="form.password"
                      type="password"
                    ></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-size-100 text-right">
                  <md-button type="submit" class="md-raised md-success"
                    >Login</md-button
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

export default {
  name: "Login",
  components: {},
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
    })
  }
};
</script>

<style>
.login_form_padding {
  margin-top: 10%;
}
</style>
