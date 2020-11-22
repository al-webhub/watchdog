<template>
  <form @submit.prevent="dispatchScans">
    <md-card>
      <md-card-header :data-background-color="dataBackgroundColor">
        <h4 class="title">{{ $t(`forms.startfullscanform.headline`) }}</h4>
        <p class="category">
          Relative path to sitemap.xml required. For example: /sitemap.xml
        </p>
      </md-card-header>

      <md-card-content>
        <div class="md-layout">
          <div class="md-layout-item md-small-size-100 md-size-100">
            <md-field>
              <label>Путь к карте сайта </label>
              <md-input v-model="form.sitemap" type="text"></md-input>
            </md-field>
          </div>

          <div class="md-layout-item md-size-100 text-right">
            <md-button type="submit" class="md-raised md-danger"
              >Start scan</md-button
            >
          </div>
        </div>
      </md-card-content>
    </md-card>
  </form>
</template>

<script>
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
export default {
  name: "start-fullscan-form",
  props: {
    dataBackgroundColor: {
      type: String,
      default: ""
    }
  },
  data() {
    return {
      form: {
        sitemap: null,
        website_id: this.$route.params.website_id
      }
    };
  },
  computed: {
    ...mapGetters({
      getFullscans: "fullscan/getFullscan"
    })
  },
  methods: {
    ...mapActions({
      startScan: "fullscan/startScan"
    }),
    async dispatchScans() {
      await this.startScan(this.form);
      let data = await this.getFullscans;
      if (data.message === "ok") {
        await this.$router
          .push({
            name: "Analytics",
            params: { website_id: this.form.website_id }
          })
          .catch(err => {});
      }
    }
  }
};
</script>

<style scoped />
