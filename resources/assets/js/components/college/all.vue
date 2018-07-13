<template>

    <div>
        <div class="alert alert-success" v-show="successAdded">
            College added Successfully
        </div>
        <form @submit.prevent="store">
            <div class="form-group col-md-9">
                <input type="text" class="form-control" v-model="name">
            </div>
            <div class="col-md-3">
                <button class="btn btn-warning btn-block" type="submit">
                    Add
                </button>
            </div>
        </form>

        <table class="table table-striped  table-bordered ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="college of colleges">
                    <td>{{ college.id }}</td>
                    <td>{{ college.name }}</td>
                </tr>
            </tbody>
        </table>


    </div>
</template>

<script>
    import Create from './create.vue';
    import axios from 'axios';

    import Vue from 'vue'
    export default {
        data() {
            return {
                colleges: [],
                name: '',
                successAdded: false
            }
        },

        components: {
            'college-create': Create,
        },
        created() {
            this.getColleges();
        },
        methods: {
            getColleges() {
                axios.get('/api/college').then(response => {
                    this.colleges = response.data.data;
                }).catch(function () {
                    return "Error";
                });
            },
            store() {
                axios.post('/api/college', {
                    name: this.name,
                }).then(
                    response => {
                        if (response.data.success == true) {
                            this.successAdded = true;
                            this.colleges.push(response.data.data);
                        }
                        // alert(response.data.posts);
                    }).catch(
                    (response) => console.log(response)
                );
            }
        },

    }
</script>