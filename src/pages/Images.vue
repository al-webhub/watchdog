<template>
  <div class="content">
    <div class="md-layout">
      <div
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
      >
        <md-card>
          <md-card-header data-background-color="green">
            <span class="title">
              Selected Page
            </span>
            <select v-model="selectedpage.filename" v-on:change="selectPage">
              <option
                v-for="page in pages"
                v-bind:value="page"
                v-bind:key="page"
                >{{ page }}
              </option>
            </select>
          </md-card-header>
          <md-card-content>
            <PageTextTable
              :rows="getParsedPage"
              v-on:getEditTextModal="getEditTextModal"
            ></PageTextTable>
          </md-card-content>
        </md-card>
      </div>
    </div>
  </div>
</template>

<script>
import { PageTextTable } from "@/components";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
import Vue from "vue";

export default {
  components: {
    PageTextTable
  },
  data() {
    return {
      selectedpage: {
        filename: this.$store.getters["pages/getPages"][0],
        search: ""
      },
      pages: this.$store.getters["pages/getPages"]
    };
  },
  methods: {
    ...mapActions({
      ScanForPages: "pages/ScanForPages",
      ParsePageImages: "images/ParsePageImages"
    }),
    selectPage() {
      this.ParsePageImages(this.selectedpage);
    }
  },
  created: function() {
    this.ScanForPages();
    this.selectPage();
  },
  computed: {
    ...mapGetters({
      getParsedPage: "pages/getParsedPage"
    })
  }
};
</script>
