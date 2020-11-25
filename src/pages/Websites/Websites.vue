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
                <h4 class="title">{{$t(`pages.websites.title`)}} </h4>
                  <md-button v-on:click="showNewModal" class="md-primary md-raised  md-sm"><md-icon >add_box</md-icon>{{$t(`pages.websites.add_btn_text`)}}</md-button>
              </div>
              <div
                class="md-layout-item md-medium-size-30 md-xsmall-size-100 md-size-30"
              >
                <md-field>
                  <label>{{$t(`pages.websites.search_placeholder`)}}</label>
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
       updateWebsite: "websites/updateWebsite",
       addWebsite: "websites/addWebsite"
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
          if (result.isConfirmed) {
              website.search = this.websites.search;
              this.deleteWebsite(website);
              Vue.swal(
                  'Deleted!',
                  'Website was deleted!',
                  'success'
              )
          }
      });
    },
    editModal: function (website) {
       Vue.swal({
              title: 'Edit website: '+ website.url,
              html:
                  '<input id="name" value="'+ website.name +'" class="swal2-input">' +
                  '<input id="url" value="'+ website.url +'" class="swal2-input">',
              focusConfirm: false,
              preConfirm: () => {
                  website.name = document.getElementById('name').value;
                  website.url = document.getElementById('url').value;
              },
              showCancelButton: true,
              confirmButtonColor: "#4caf50",
              cancelButtonColor: "#f44336"
          }).then(result => {
             if (result.isConfirmed) {
                 website.search = this.websites.search;
                 this.updateWebsite(website);
                 Vue.swal(
                     'Updated!',
                     'Website was updated!',
                     'success'
                 )
             }
          });
    },
    toggleActive: function(website) {
      website.search = this.websites.search;
      website.toggle = 1;
      this.updateWebsite(website);
    },
    showNewModal: function () {
        let website = {
            'name': null,
            'url': null
        };
        Vue.swal({
            title: 'Add website: ',
            html:
                '<input id="name" value="" class="swal2-input" placeholder="Name">' +
                '<input id="url" value="" class="swal2-input" placeholder="URL">',
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonColor: "#4caf50",
            cancelButtonColor: "#f44336",
            preConfirm: async () => {
              website.name = document.getElementById('name').value;
              website.url = document.getElementById('url').value;
              website.search = this.websites.search;
              await this.addWebsite(website);
            }
        }).then(result => {
            if (result.isConfirmed) {
                Vue.swal(
                    'Created!',
                    'New website was added!',
                    'success'
                )
            }
        });
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
