<template>
  <div class="md-layout section" id="contacts">
    <div class="md-layout-item  section-normal">
      <div
        class="md-layout-item  md-lay md-medium-size-100 md-size-33  "
        style="float: right;"
      >
        <form @submit.prevent="submit" class="transparent">
          <md-card>
            <h2 class="not_transparent text-center " style="color: white">
              Any question?
            </h2>

            <md-card-content class="not_transparent">
              <div class="md-layout">
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>Email</label>
                    <md-input
                      v-model="form.email"
                      type="email"
                      class="caret_color_red"
                    ></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>Name</label>
                    <md-input
                      class="caret_color_red"
                      v-model="form.name"
                      type="text"
                    ></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-100">
                  <md-field>
                    <label>Message</label>
                    <md-textarea
                      class="caret_color_red"
                      v-model="form.message"
                    ></md-textarea>
                  </md-field>
                </div>
                <div class="md-layout-item md-size-100 ">
                  <md-button
                    type="submit"
                    style="background-color: transparent !important;border: 1px solid white;"
                    class="md-raised btn-transparent"
                    >Send</md-button
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
export default {
  data() {
    return {
      form: {
        email: "",
        name: "",
        message: ""
      }
    };
  }
};
</script>

<style scoped></style>
