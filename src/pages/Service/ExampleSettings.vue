<template>
  <div class="content">
    <div class="md-layout">
      <div
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
      >
        <md-card class="md-card-plain">
          <md-card-header data-background-color="red">
            <div class="md-layout">
              <div
                class="md-layout-item md-medium-size-70 md-xsmall-size-100 md-size-70 inline-w-button"
              >
                <md-button
                  v-on:click="showNewModal"
                  class="md-success md-raised md-sm add-btn"
                  ><md-icon>add_box</md-icon
                  >{{ $t(`pages.websites.add_btn_text`) }}</md-button
                >
                <h4 class="title">Example websites</h4>
              </div>
              <div
                class="md-layout-item md-medium-size-30 md-xsmall-size-100 md-size-30"
              ></div>
            </div>
          </md-card-header>
          <md-card-content>
            <example-settings-table
              :rows="getExamples"
              v-on:confirmDeleteModal="confirmDeleteModal"
              v-on:editModal="editModal"
            />
          </md-card-content>
        </md-card>
      </div>
    </div>
  </div>
</template>

<script>
import { ExampleSettingsTable } from "@/components";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
import Vue from "vue";
export default {
  components: {
    ExampleSettingsTable
  },
  data() {
    return {
      users: {
        search: ""
      },
      examples: null
    };
  },
  methods: {
    ...mapActions({
      addExample: "examples/addExample",
      requestExamples: "examples/requestExamples",
      deleteExample: "examples/deleteExample",
      updateExample: "examples/updateExample"
    }),
    showNewModal: function() {
      let data = {
        url: null,
        image: null
      };
      Vue.swal({
        title: "Add new: ",
        html:
          '<input id="url" value="" class="swal2-input" placeholder="Url">' +
          '<input id="image" value="" class="swal2-input" placeholder="image">',
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonColor: "#4caf50",
        cancelButtonColor: "#f44336",
        preConfirm: async () => {
          data.url = document.getElementById("url").value;
          data.image = document.getElementById("image").value;
          await this.addExample(data);
        }
      }).then(result => {
        if (result.isConfirmed) {
          Vue.swal("Created!", "New website was added!", "success");
        }
      });
    },
    confirmDeleteModal: function(example) {
      Vue.swal({
        title: "Warning",
        text: "Are you sure want to delete example?: " + example.url,
        showCancelButton: true,
        confirmButtonColor: "#4caf50",
        cancelButtonColor: "#f44336"
      }).then(result => {
        if (result.isConfirmed) {
          this.deleteExample(example.id);
          Vue.swal("Deleted!", "User was deleted!", "success");
        }
      });
    },
    editModal: function(example) {
      let data = {
        url: null,
        image: null
      };
      Vue.swal({
        title: "Edit example: " + example.url,
        html:
          '<input id="url" value="' +
          example.url +
          '" class="swal2-input">' +
          '<input id="image" value="' +
          example.image +
          '" class="swal2-input">',
        focusConfirm: false,
        preConfirm: () => {
          data.url = document.getElementById("url").value;
          data.image = document.getElementById("image").value;
          data.id = example.id;
        }
      }).then(async result => {
        if (result.isConfirmed) {
          await this.updateExample(data);
          Vue.swal("Updated!", "Example was updated!", "success");
        }
      });
    }
  },
  computed: {
    ...mapGetters({
      getExamples: "examples/getExamples"
    })
  },
  created: async function() {
    await this.requestExamples();
  }
};
</script>

<style>
.inline-w-button {
  display: flex;
  flex-direction: row;
}
.add-btn {
  margin: 0 0.5rem !important;
}
</style>
