<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-brand" >Чебуречная</div>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <RouterLink v-if="accessToken" to="/" class="btn btn-outline-success me-2" >Список чебуреков</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink v-if="accessToken" to="/create" class="btn btn-outline-success me-2" >Добавить чебурек</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink v-if="accessToken" to="/profit" class="btn btn-outline-success me-2" >Польза чебуреков</RouterLink>
                    </li>
                  <li class="nav-item">
                    <RouterLink v-if="!accessToken" to="/create.user" class="btn btn-outline-success me-2" >Добавить пользователя</RouterLink>
                  </li>
                  <li class="nav-item">
                    <RouterLink v-if="accessToken" to="/users" class="btn btn-outline-success me-2" >Список пользователей</RouterLink>
                  </li>
                  <li class="nav-item">
                    <RouterLink v-if="!accessToken" to="/login" class="btn btn-outline-success me-2" >Вход</RouterLink>
                  </li>
                  <li class="nav-item">
                    <RouterLink v-if="accessToken" to="/personal" class="btn btn-outline-success me-2" >Страница пользователя</RouterLink>
                  </li>
                </ul>
                <span class="navbar-text">
        Кушайте на здоровье
      </span>
            </div>
        </div>
    </nav>
 <div class="container">
     <RouterView />
 </div>
</template>

<script >
export default {
  data() {
    return {
      accessToken: null
    }
  },

  mounted() {
    this.getAccessToken()
  },

  updated() {
    this.getAccessToken()
  },

  methods: {
    getAccessToken() {
      this.accessToken = localStorage.getItem('access_token')
    }
  }
}
</script>

<style>

</style>
