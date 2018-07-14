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
                        <tr v-for="user of users" :key="user.id">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td v-if="user.reg_status == 1">Regesterd</td>
                            <td v-else>Un Regestered</td>

                            <td v-if="user.pay_status == 1">Payed
                                <a @click="allowPay(0, user)">
                                    <span class="text-warning">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                </a>
                            </td>
                            <td v-else>Un Payed
                                <a @click="allowPay(1, user)">
                                    <span class="text-warning">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                </a>
                            </td>
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
                successAdded: false,
                users: []
            }
        },
        created() {
            this.getUsers();
            // this.getColleges();
        },
        methods: {
            getUsers() {
                axios.get('/api/users').then(response => {
                    console.log(response.data);
                    this.users = response.data.data;
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
            },
            allowPay(state, user) {
                console.log(state);
                console.log(user);
                axios.post('/api/allow_pay', {
                        pay_status: state,
                        user_id: user.id
                    })
                    .then((response) => {
                        this.users = []
                        this.users = response.data.users
                        console.log(response.data);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },

    }
</script>