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
                <h4 class="title">Registered users</h4>
              </div>
              <div
                class="md-layout-item md-medium-size-30 md-xsmall-size-100 md-size-30"
              >
                <md-field>
                  <label>Search:</label>
                  <md-input
                          v-model="users.search"
                          v-on:keyup="search"
                  />
                </md-field>
              </div>
            </div>
          </md-card-header>
          <md-card-content>
            <users-table
              :rows="getUsers"
              v-on:deleteUserModal="deleteUserModal"
              v-on:editUserModal="editUserModal"
            >
            </users-table>
          </md-card-content>
        </md-card>
      </div>
    </div>
  </div>
</template>

<script>
import { UsersTable } from "@/components";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
import Vue from "vue";

export default {
  components: {
    UsersTable
  },
  data() {
    return {
      users: {
        search: ""
      }
    };
  },
  methods: {
    ...mapActions({
      requestUsers: "users/requestUsers",
      deleteUser: "users/deleteUser",
      updateUser: "users/updateUser"
    }),
    search() {
      this.requestUsers(this.users.search);
    },
    deleteUserModal: function(user) {
      Vue.swal({
        title: "Warning",
        text: "Are you sure want to delete user: " + user.name,
        showCancelButton: true,
        confirmButtonColor: "#4caf50",
        cancelButtonColor: "#f44336"
      }).then(result => {
        if (result.isConfirmed) {
          user.search = this.users.search;
          this.deleteUser(user);
          Vue.swal(
            'Deleted!',
            'User was deleted!',
            'success'
          )
        }
      });
    },
    editUserModal: function (user) {
      Vue.swal({
        title: 'Edit user: '+ user.name,
        html:
                '<input id="name" value="'+ user.name +'" class="swal2-input">' +
                '<input id="email" value="'+ user.email +'" class="swal2-input">',
        focusConfirm: false,
        preConfirm: () => {
          user.email = document.getElementById('email').value;
          user.name = document.getElementById('name').value;
        }
      }).then(result => {
          if (result.isConfirmed) {
              user.search = this.users.search;
              this.updateUser(user);
              Vue.swal(
                  'Updated!',
                  'User was updated!',
                  'success'
              )
          }
      });
    }
  },
  computed: {
    ...mapGetters({
      getUsers: "users/getUsers"
    })
  },
  created: function() {
    this.requestUsers();
  }
};
</script>
