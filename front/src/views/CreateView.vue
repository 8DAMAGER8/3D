<template>
    <h3 class="text-center mt-3">
        Добавление чебурека
    </h3>
    <form class="w-50 table">
        <div class="mb-3 ">
            <label for="name" class="form-label">Вкус</label>
            <input type="text" class="form-control" v-model="name" placeholder="С какой начинкой">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" class="form-control" v-model="price" placeholder="Укажите цену">
        </div>
        <div class="mb-3">
            <input @click.prevent="createCheburek" type="submit" class="btn btn-primary" value="Добавить Чебурек">
        </div>

    </form>
</template>

<style>
</style>
<script>
import axios from "axios";
import {BACKAND_URL} from "../main.js"

export default {
    data() {
        return {
            name: null,
            price: null,
        }
    },

    methods: {
        createCheburek() {
            axios.post(BACKAND_URL + `/api/create`, {
                    name: this.name,
                    price: this.price,
                },
                {
                    headers: {
                        'ngrok-skip-browser-warning': 'any'
                    }
                }).then(this.$router.push('/'))
                .catch((error) => {
                    console.error(error)
                })
        },
    }
}
</script>