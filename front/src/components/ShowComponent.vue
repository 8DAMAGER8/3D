<template>
    <tr :class="this.$parent.isEdit(cheburek.id) ? 'd-none' : '' ">
        <th scope="row">{{ cheburek.id }}</th>
        <td>{{ cheburek.name }}</td>
        <td>{{ cheburek.price }}</td>
        <td><a href="#" @click.prevent="changeEditCheburekId(cheburek.id, cheburek.name, cheburek.price)"
               class="btn btn-success">Edit</a></td>
        <td><a href="#" @click.prevent="deleteCheburek(cheburek.id)" class="btn btn-danger">Delete</a></td>
    </tr>
</template>

<script>
import {BACKAND_URL} from "../main";
export default {
    name: "ShowComponent",

    data() {
        return {}
    },

    mounted() {

    },

    props: [
        'cheburek'
    ],

    methods: {
        deleteCheburek(id) {
            this.editCheburekId = null
            axios.post(BACKAND_URL + `/api/delete/${id}`,
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

        changeEditCheburekId(id, name, price) {
            this.$parent.editCheburekId = id
            let editName = `edit_${id}`
            let fullEditName = this.$parent.$refs[editName][0];
            fullEditName.name = name
            fullEditName.price = price
        },

    }
}
</script>

<style scoped>

</style>
