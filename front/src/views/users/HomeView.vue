<template>
  <h3 class="text-center mt-3">
    Список пользователей
  </h3>
  <div>
    <table class="table table-striped table-hover">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Имя</th>
        <th scope="col">Email</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
      </thead>
      <tbody>
      <template v-for="user in userList">
        <show-user-component :user="user" :ref="`show_${user.id}`"></show-user-component>
        <edit-user-component :user="user" :ref="`edit_${user.id}`"></edit-user-component>
      </template>
      </tbody>
    </table>
  </div>
</template>

<script>

import {BACKAND_URL} from "../../main.js"
import ShowUserComponent from "./components/ShowComponent.vue";
import EditUserComponent from "./components/EditComponent.vue";

export default {
  components: {EditUserComponent, ShowUserComponent},
  data() {
    return {
      userList: null,
      editUserId: null,
      id: null,
      name: null,
      email: null
    }
  },

  mounted() {
    this.getUser()
    this.getToken()
  },
  methods: {
    getToken() {
        console.log(localStorage.getItem('access_token'))
    },
    getUser() {
      axios.get(
          BACKAND_URL + `/api/get.user`,
          {
            headers: {
              'ngrok-skip-browser-warning': 'any'
            },
          }
      )
          .then(response => {
            this.userList = response.data
          })
          .catch((error) => {
            console.error(error)
          })
    },
    deleteUser(id) {
      axios.post(
          BACKAND_URL + `/api/delete.user/${id}`,
          {
            headers: {
              'ngrok-skip-browser-warning': 'any'
            }
          })
          .then(res => {
            this.getUser()
          })
          .catch((error) => {
            console.error(error)
          })
    },
    isEdit(id) {
      return this.editUserId === id
    },
  }
}
</script>
