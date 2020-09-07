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
                class="md-layout-item md-medium-size-70 md-xsmall-size-100 md-size-70"
              >
                <h4 class="title">Monitored websites</h4>
              </div>
              <div
                class="md-layout-item md-medium-size-30 md-xsmall-size-100 md-size-30"
              >
                <md-field>
                  <label>Search:</label>
                  <md-input v-model="websites.search" v-on:keyup="search" />
                </md-field>
              </div>
            </div>
          </md-card-header>
          <md-card-content>
            <websites-table  :rows="getWebsites"
                             v-on:ShowDeleteModal="deleteModal"
                             v-on:ShowEditModal="editModal"
                             v-on:toggleActive="toggleActive"
            ></websites-table>
          </md-card-content>
        </md-card>
      </div>
    </div>
  </div>
</template>

<script>
import { WebsitesTable } from "@/components";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
import Vue from "vue";

export default {
  components: {
    WebsitesTable
  },
  data() {
    return {
      websites: {
        search: ""
      }
    };
  },
  methods: {
    ...mapActions({
       requestWebsites: "websites/requestWebsites",
       deleteWebsite: "websites/deleteWebsite",
       updateWebsite: "websites/updateWebsite"
    }),
    search() {
      this.requestWebsites(this.websites.search);
    },
    deleteModal: function(website) {
      Vue.swal({
          title: "Warning",
          text: "Are you sure want to delete website: " + website.url,
          showCancelButton: true,
          confirmButtonColor: "#4caf50",
          cancelButtonColor: "#f44336"
      }).then(result => {
          website.search = this.websites.search;
          this.deleteWebsite(website);
          Vue.swal(
              'Deleted!',
              'Website was deleted!',
              'success'
          )
      });
    },
    editModal: function (website) {
       Vue.swal({
          title: 'Edit website: '+ website.url,
              html:
                  '<input id="name" value="'+ website.name +'" class="swal2-input">' +
                  '<input id="url" value="'+ website.url +'" class="swal2-input">' +
                  '<select class="form-control">' +
                  '<option >TEST</option>' +
                  '<option>TEST</option>' +
                  '<option>TEST</option>' +
                  '</select>',
              focusConfirm: false,
              preConfirm: () => {
                  user.email = document.getElementById('email').value;
                  user.name = document.getElementById('url').value;
              }
          }).then(result => {

          });
    },
    toggleActive: function(website) {
      website.search = this.websites.search;
      website.toggle = 1;
      this.updateWebsite(website);
    }
  },
  computed: {
    ...mapGetters({
        getWebsites: "websites/getWebsites"
    })
  },
  created: function() {
    this.requestWebsites(this.websites.search);
  }
};
</script>
