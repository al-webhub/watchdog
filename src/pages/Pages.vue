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
            <PageTextTable :rows="getParsedPage" v-on:getEditTextModal="getEditTextModal"></PageTextTable>
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
        this.ParsePage(this.selectedpage);
      }
    },
    getEditTextModal: function (item) {
      Vue.swal({
        input: 'textarea',
        inputValue: item.value,
        confirmButtonColor: '#4caf50',
        inputAttributes: {
          'aria-label': 'Type your message here'
        },
        showCancelButton: true
      }).then((result) => {
         alert('Process Edit!');
      });
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
