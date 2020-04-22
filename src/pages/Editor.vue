<template>
  <div class="content">
    <span>Last modified: {{ getLastModified }}</span>
    <select v-model="selectedpage.filename" v-on:change="selectPage">
      <option v-for="page in pages" v-bind:value="page" v-bind:key="page"
        >{{ page }}
      </option>
    </select>
    <codemirror
      v-model="getPageContents"
      ref="cmEditor"
      :options="cmOption"
      @input="onCmCodeChange"
    ></codemirror>
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
        theme: "monokai"
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
      getFileContents: "editor/getFileContents",
      updatePageContents: "editor/updateFileContents"
    }),
    selectPage() {
      this.getFileContents(this.selectedpage);
    },
    onCmCodeChange(newCode) {
      this.code = newCode;
      this.updatePageContents({
        contents: this.code,
        filename: this.selectedpage.filename
      });
    }
  },
  created: function() {
    this.ScanForPages();
    this.getFileContents(this.selectedpage);
  },
  computed: {
    ...mapGetters({
      getPageContents: "editor/getPageContents",
      getLastModified: "editor/getPageLastModified"
    }),
    codemirror() {
      return this.$refs.cmEditor.codemirror;
    }
  },
  mounted() {
    this.codemirror.setSize("", "100%");
  }
};
</script>

<style scoped></style>
