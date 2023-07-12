<template>
    <tr :class="this.$parent.isEdit(cheburek.id) ? '' : 'd-none'">
        <th scope="row">{{ cheburek.id }}</th>
        <td><input type="text" v-model="name" class="form-control"></td>
        <td><input type="number" v-model="price" class="form-control"></td>
        <td><a href="#" @click.prevent="updateCheburek(cheburek.id)" class="btn btn-success">Update</a></td>
    </tr>
</template>

<script>
import {BACKAND_URL} from "../main.js"
export default {
    name: "EditComponent",

    props: [
        'cheburek'
    ],

    data() {
        return {
            name: null,
            price: null
        }
    },

    mounted() {
    },

    methods: {
        updateCheburek(id) {
            this.$parent.editCheburekId = null
            axios.post(BACKAND_URL + `/api/update/${id}`, {
                    name: this.name,
                    price: this.price
                },
                {
                    headers: {
                        'ngrok-skip-browser-warning': 'any'
                    }
                })
                .then(res => {
                    this.$parent.getCheburek()
                })
                .catch((error) => {
                    console.error(error)
                })
        },

    }
}
</script>

<style scoped>

</style>
