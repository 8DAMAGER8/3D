<template>
  <h3 class="text-center mt-3">
    Регистрация пользователя
  </h3>
  <form class="w-50 table">
    <div class="mb-3 ">
      <label for="name" class="form-label">Имя</label>
      <input type="text" class="form-control" v-model="name" placeholder="Укажите Имя">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Почта</label>
      <input type="email" class="form-control" v-model="email" placeholder="Укажите Email">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Пароль</label>
      <input type="password" class="form-control" v-model="password" placeholder="Введите пароль">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Подтверждение пароля</label>
      <input type="password" class="form-control" v-model="password_confirmation" placeholder="Повторите пароль">
    </div>
    <div class="mb-3">
      <input @click.prevent="createUser" type="submit" class="btn btn-primary" value="Добавить пользователя">
    </div>
  </form>
</template>

<style>
</style>
<script>
import axios from "axios";
import {BACKAND_URL} from "@/main"

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
    }
  },

  methods: {
    createUser() {
      axios.post(BACKAND_URL + `/api/auth/registration`, {
            name: this.name,
            email: this.email,
            password: this.password,
            password_confirmation: this.password_confirmation,
          },
          {
            headers: {
              'ngrok-skip-browser-warning': 'any'
            }
          }).then(res => {
        localStorage.setItem('access_token', res.data.access_token)
        this.$router.push({name: 'personal'})
        window.location.reload()
      }).catch((error) => {
        console.error(error)
      })
    },
  }
}
</script>