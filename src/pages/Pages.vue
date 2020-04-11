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
            <input
              type="text"
              class="pull-right"
              v-model="selectedpage.search"
              v-on:keyup="searchOnPageTexts"
              placeholder="Search"
            />
          </md-card-header>
          <md-card-content>
            <PageTextTable :rows="getParsedPage"></PageTextTable>
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
import Vue from 'vue'
import { router } from '../main'
export default {
  components: {
    PageTextTable
  },
  data() {
    return {
      selectedpage: {
        filename: "",
        search: ""
      },
      pages: this.$store.getters["pages/getPages"]
    };
  },
  methods: {
    ...mapActions({
      ScanForPages: "pages/ScanForPages",
      ParsePage: "pages/ParsePage"
    }),
    selectPage() {
      this.ParsePage(this.selectedpage);
    },
    searchOnPageTexts() {
      if (this.selectedpage.filename === "") {
        Vue.swal("Warning!", "Please select page first!", "warning");
      } else {
        if (this.selectedpage.search.length > 3) {

        }
        this.ParsePage(this.selectedpage);
      }
    }
  },
  created: function() {
    this.ScanForPages();
  },
  computed: {
    ...mapGetters({
      getParsedPage: "pages/getParsedPage"
    })
  }
};
</script>
