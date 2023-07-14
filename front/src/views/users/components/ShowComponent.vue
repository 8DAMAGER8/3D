<template>
    <tr :class="this.$parent.isEdit(user.id) ? 'd-none' : '' ">
        <th scope="row">{{ user.id }}</th>
        <td>{{ user.name }}</td>
        <td>{{ user.email }}</td>
        <td><a href="#" @click.prevent="changeEditUserId(user.id, user.name, user.email)"
               class="btn btn-success">Edit</a></td>
        <td><a href="#" @click.prevent="deleteUser(user.id)" class="btn btn-danger">Delete</a></td>
    </tr>
</template>

<script>
import {BACKAND_URL} from "../../../main";
export default {
    name: "ShowUserComponent",

    data() {
        return {}
    },

    mounted() {

    },

    props: [
        'user'
    ],

    methods: {
        deleteUser(id) {
            this.editUserId = null
            axios.post(BACKAND_URL + `/api/delete.user/${id}`,
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

        changeEditUserId(id, name, email) {
            this.$parent.editUserId = id
            let editName = `edit_${id}`
            let fullEditName = this.$parent.$refs[editName][0];
            fullEditName.name = name
            fullEditName.email = email
        },

    }
}
</script>

<style scoped>

</style>
