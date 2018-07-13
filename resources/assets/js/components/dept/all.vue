<template>

    <div>
        <div class="alert alert-success" v-show="successAdded">
            Department added Successfully
        </div>
        <form @submit.prevent="store">
            <div class="form-group col-md-3">
                <select v-model="college_id" class="form-control">
                    <option value="">Select College</option>
                    <option v-for="college of colleges" :value="college.id">{{ college.name }}</option>
                </select>
            </div>
            <div class="form-group col-md-6">
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
                <tr v-for="dept of depts">
                    <td>{{ dept.id }}</td>
                    <td>{{ dept.name }}</td>
                </tr>
            </tbody>
        </table>


    </div>
</template>

<script>
    import axios from 'axios';

    import Vue from 'vue'
    export default {
        data() {
            return {
                depts: [],
                colleges: [],
                name: '',
                college_id: null,
                successAdded: false
            }
        },
        created() {
            this.getDepts();
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
            getDepts() {
                axios.get('/api/dept').then(response => {
                    this.depts = response.data.data;
                }).catch(function () {
                    return "Error";
                });
            },
            store() {
                axios.post('/api/dept', {
                    name: this.name,
                    college_id: this.college_id,
                }).then(
                    response => {
                        if (response.data.success == true) {
                            this.successAdded = true;
                            this.depts.push(response.data.data);
                        }
                        // alert(response.data.posts);
                    }).catch(
                    (response) => console.log(response)
                );
            }
        },

    }
</script>