<template>

    <div>
        <div class="alert alert-success" v-show="successAdded">
            Job added Successfully
        </div>
        <form @submit.prevent="store">
            <div class="form-group col-md-3">
                <select v-model="dept_id" class="form-control">
                    <option value="">Select dept</option>
                    <option v-for="dept of depts" :value="dept.id">{{ dept.name }}</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <select v-model="semester" class="form-control">
                    <option value="">Select semester</option>
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                    <option value="3">Semester 3</option>
                    <option value="4">Semester 4</option>
                    <option value="5">Semester 5</option>
                    <option value="6">Semester 6</option>
                    <option value="7">Semester 7</option>
                    <option value="8">Semester 8</option>
                    <option value="9">Semester 9</option>
                    <option value="10">Semester 10</option>
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