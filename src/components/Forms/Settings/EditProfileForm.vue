<template>
  <form @submit.prevent="updProfile">
    <md-card>
      <md-card-header :data-background-color="dataBackgroundColor">
        <h4 class="title">Edit Current User</h4>
        <p class="category">Complete your profile</p>
      </md-card-header>

      <md-card-content>
        <div class="md-layout">
          <div class="md-layout-item md-small-size-100 md-size-100">
            <md-field>
              <label>Email </label>
              <md-input v-model="form.email" disabled type="email"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-100">
            <md-field>
              <label>Name</label>
              <md-input v-model="form.name"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-100">
            <md-field>
              <label>Current password</label>
              <md-input v-model="form.password" type="password"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-small-size-100 md-size-100">
            <md-field>
              <label>New password</label>
              <md-input v-model="form.newpassword" type="password"></md-input>
            </md-field>
          </div>
          <div class="md-layout-item md-size-100 text-right">
            <md-button type="submit" class="md-raised md-success"
              >Update Profile</md-button
            >
          </div>
        </div>
      </md-card-content>
    </md-card>
  </form>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "EditProfileForm",
  props: {
    dataBackgroundColor: {
      type: String,
      default: ""
    }
  },
  data() {
    return {
      form: {
        email: this.$store.getters['auth/getUser'].email,
        name: this.$store.getters['auth/getUser'].name,
        password: "",
        newpassword: ""
      }
    };
  },
  methods: {
    ...mapActions({
      updateProfile: "settings/updateProfile"
    }),
    updProfile() {
      this.updateProfile(this.form).then();
    }
  }
};


</script>

<style scoped></style>
