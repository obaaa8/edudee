<template>

    <div>
        <div class="row">

            <div class="col-md-8">
                <table class="table table-striped  table-bordered ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="dept of depts">
                            <td>{{ dept._id }}</td>
                            <td>{{ dept.name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">

                <h5>Add new Subject</h5>
                <div class="alert alert-success" v-show="successAdded">
                    Job added Successfully
                </div>

                <form @submit.prevent="store">
                    <div class="form-group">
                        <select v-model="dept_id" class="form-control">
                            <option value="">Select dept</option>
                            <option v-for="dept of depts" :value="dept._id">{{ dept.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="name">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning btn-block" type="submit">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>





    </div>
</template>

<script>
    import axios from 'axios';

    import Vue from 'vue'
    export default {
        data() {
            return {
                depts: [],
                semester: null,
                name: '',
                dept_id: null,
                successAdded: false
            }
        },
        created() {
            this.getDepts();
            // this.getColleges();
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
                axios.post('/api/subject', {
                    name: this.name,
                    semester: this.semester,
                    dept_id: this.dept_id,
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