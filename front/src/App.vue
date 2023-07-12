<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>
<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-brand" >Чебуречная</div>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <RouterLink to="/" class="btn btn-outline-success me-2" >Список чебуреков</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink to="/create" class="btn btn-outline-success me-2" >Добавить чебурек</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink to="/profit" class="btn btn-outline-success me-2" >Польза чебуреков</RouterLink>
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

<style scoped>

</style>
