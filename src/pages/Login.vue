<template>
  <form @submit.prevent="submit">
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
import axios from "axios";
export default {
  name: "Login",
  components: {},
  data() {
    return {
      form: {
        email: "",
        password: ""
      }
    };
  },
  methods: {
    async submit() {
      let response = axios.post("/api/auth/signin", this.form);
      console.log(response);
    }
  }
};
</script>
