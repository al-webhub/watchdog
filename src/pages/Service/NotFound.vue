<template>
  <div class="content">
    <div class="md-layout md-alignment-bottom-center ">
      <div class="md-layout-item md-lay md-medium-size-100 md-size-33 login_form_padding ">
          <md-card>
            <md-card-header data-background-color="red">
              <h1 class="title text-center">404</h1>
              <p class="category"></p>
            </md-card-header>
            <md-card-content>
              <div class="md-layout">
                <div class="md-layout-item md-size-100 text-right">
                  <md-button
                    @click="$router.push('/login')"
                    class="md-raised md-danger pull-left md-block"
                    >Home</md-button
                  >
                </div>
              </div>
            </md-card-content>
          </md-card>
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
