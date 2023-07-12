<template>
    <h3 class="text-center mt-3">
        Список чебуреков
    </h3>
    <div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Начинка</th>
                <th scope="col">Цена</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="cheburek in cheburekList">
                <show-component :cheburek="cheburek" :ref="`show_${cheburek.id}`"></show-component>
                <edit-component :cheburek="cheburek" :ref="`edit_${cheburek.id}`"></edit-component>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import ShowComponent from "../components/ShowComponent.vue";
import EditComponent from "../components/EditComponent.vue";
import {BACKAND_URL} from "../main.js"

export default {
    components: {EditComponent, ShowComponent},
    data() {
        return {
            cheburekList: null,
            editCheburekId: null,
            id: null,
            name: null,
            price: null
        }
    },

    mounted() {
        this.getCheburek()
    },
    methods: {
        getCheburek() {
            axios.get(
                BACKAND_URL + `/api/get`,
                {
                    headers: {
                        'ngrok-skip-browser-warning': 'any'
                    },
                }
            )
                .then(response => {
                    this.cheburekList = response.data
                })
                .catch((error) => {
                    console.error(error)
                })
        },
        deleteCheburek(id) {
            axios.post(
                BACKAND_URL + `/api/delete/${id}`,
                {
                    headers: {
                        'ngrok-skip-browser-warning': 'any'
                    }
                })
                .then(res => {
                    this.getCheburek()
                })
                .catch((error) => {
                    console.error(error)
                })
        },
        isEdit(id) {
            return this.editCheburekId === id
        },
    }
}
</script>
