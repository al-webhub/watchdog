<template>
  <div class="content">
    <div class="md-layout">
      <div
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
      >
        <md-card>
          <md-card-header data-background-color="green">
            <h4 class="title">
              Selected Page
              <select v-model="selectedpage.filename" v-on:change="selectPage">
                <option
                  v-for="page in pages"
                  v-bind:value="page"
                  v-bind:key="page"
                  >{{ page }}</option
                >
              </select>
            </h4>
          </md-card-header>
          <md-card-content>
            {{ getParsedPage }}
            <SimpleTable ></SimpleTable>

          </md-card-content>
        </md-card>
      </div>
    </div>
  </div>
</template>

<script>
import { SimpleTable } from "@/components";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
export default {
  components: {
    SimpleTable
  },
  data() {
    return {
      selectedpage: {
        filename: ""
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
