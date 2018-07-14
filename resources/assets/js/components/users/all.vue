<template>

    <div>
        <div class="row">

            <div class="col-md-12">
                <table class="table table-striped  table-bordered ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Registrated</th>
                            <th>Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="dept of depts">
                            <td>{{ dept.id }}</td>
                            <td>{{ dept.name }}</td>
                            <td>{{ dept.name }}</td>
                            <td>{{ dept.name }}</td>
                        </tr>
                    </tbody>
                </table>
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