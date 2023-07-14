<template>
    <tr :class="this.$parent.isEdit(user.id) ? '' : 'd-none'">
        <th scope="row">{{ user.id }}</th>
        <td><input type="text" v-model="name" class="form-control"></td>
        <td><input type="email" v-model="email" class="form-control"></td>
        <td><a href="#" @click.prevent="updateUser(user.id)" class="btn btn-success">Update</a></td>
    </tr>
</template>

<script>
import {BACKAND_URL} from "../../../main.js"
export default {
    name: "EditUserComponent",

    props: [
        'user'
    ],

    data() {
        return {
            name: null,
            email: null
        }
    },

    mounted() {
    },

    methods: {
        updateUser(id) {
            this.$parent.editUserId = null
            axios.post(BACKAND_URL + `/api/update.user/${id}`, {
                    name: this.name,
                    email: this.email
                },
                {
                    headers: {
                        'ngrok-skip-browser-warning': 'any'
                    }
                })
                .then(this.$parent.getUser())
                .catch((error) => {
                    console.error(error)
                })
        },

    }
}
</script>

<style scoped>

</style>
