<template>
  <form @submit.prevent="submit">
    {{ form }}
    <div>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" v-model="form.email" />
    </div>
    <div>
      <label for="password">Password</label>
      <input
        type="password"
        name="password"
        id="password"
        v-model="form.password"
      />
    </div>
    <div>
      <button type="submit">Sign in</button>
    </div>
  </form>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "Login",
  components: {},

  methods: {
    ...mapActions({
      signIn: "auth/signIn"
    }),
    submit() {
      console.log(this.form);
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
  }
};
</script>
