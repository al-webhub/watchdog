<template>
  <div class="content">
    <div class="md-layout">
      <div
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
      >
        {{}}
        <md-card>
          <md-card-header data-background-color="green">
            <span class="title">Code Editor</span>
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
            <codemirror
              v-model="getPageContents"
              ref="cmEditor"
              :options="cmOption"
            ></codemirror>
          </md-card-content>
        </md-card>
      </div>
    </div>
  </div>
</template>

<script>
import { codemirror } from "vue-codemirror";
import "codemirror/lib/codemirror.css";
import "codemirror/theme/base16-dark.css";
import "codemirror/mode/xml/xml.js";
import "codemirror/theme/monokai.css";
import "codemirror/addon/selection/active-line.js";
import "codemirror/addon/edit/closetag.js";
import { mapActions, mapGetters } from "vuex";
export default {
  name: "Editor",
  components: {
    codemirror
  },
  data() {
    return {
      code: this.$store.getters["editor/getPageContents"],
      cmOption: {
        tabSize: 4,
        styleActiveLine: true,
        lineNumbers: true,
        autoCloseTags: true,
        line: true,
        mode: "text/html",
        theme: "monokai",
        viewportMargin: Infinity
      },
      selectedpage: {
        filename: this.$store.getters["pages/getPages"][0]
      },
      pages: this.$store.getters["pages/getPages"]
    };
  },
  methods: {
    ...mapActions({
      ScanForPages: "pages/ScanForPages",
      getFileContents: "editor/getFileContents"
    }),
    selectPage() {
      this.getFileContents(this.selectedpage);
    }
  },
  created: function() {
    this.ScanForPages();
    this.getFileContents(this.selectedpage);
  },
  computed: {
    ...mapGetters({
      getPageContents: "editor/getPageContents"
    })
  }
};
</script>

<style scoped>
.CodeMirror {
  border: 1px solid #eee;
  height: auto;
}
</style>
