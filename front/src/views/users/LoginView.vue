<template>
  <h3 class="text-center mt-3">
    Добавление чебурека
  </h3>
  <form class="w-50 table">
    <div class="mb-3">
      <label for="price" class="form-label">Почта</label>
      <input type="email" class="form-control" v-model="email" placeholder="Введите Email">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Пароль</label>
      <input type="password" class="form-control" v-model="password" placeholder="Введите пароль">
    </div>
    <div class="mb-3">
      <input @click.prevent="login" type="submit" class="btn btn-primary" value="Вход">
    </div>
  </form>
</template>

<style>
</style>
<script>
import axios from "axios";
import {BACKAND_URL} from "../../main.js"

export default {
  data() {
    return {
      email: '',
      password: '',
    }

  },

  methods: {
    login() {
      axios.post(BACKAND_URL + `/api/auth/login`, {
            email: this.email,
            password: this.password,
          },
          {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'ngrok-skip-browser-warning': 'any'
            }
          }).then(res => {
        localStorage.setItem('access_token', res.data.access_token)
        this.$router.push({name: 'personal'})
        window.location.reload()
      })
    },
  }
}
</script>