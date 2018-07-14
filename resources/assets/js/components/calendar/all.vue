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
                        <tr v-for="calendar of calendars">
                            <td>{{ calendar.id }}</td>
                            <td>{{ calendar.name }}</td>
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
                        <select v-model="subject_id" class="form-control">
                            <option value="">Select subject</option>
                            <option v-for="subject of subjects" :value="subject.id">{{ subject.name }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" v-model="date" placeholder="Date">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" v-model="start" placeholder="Start time">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" v-model="finish" placeholder="Finsh Time">
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
                semester: null,
                calendars: [],
                subjects: [],
                date: null,
                start: '',
                finish: '',
                subject_id: null,
                successAdded: false
            }
        },
        created() {
            this.getSubjects();
        },
        methods: {
            getSubjects() {
                axios.get('/api/subject').then(response => {
                    this.subjects = response.data.data;
                }).catch(function () {
                    return "Error";
                });
            },
            store() {
                axios.post('/api/calendar', {
                    date: this.date,
                    start: this.start,
                    finish: this.finish,
                    subject_id: this.subject_id,
                }).then(
                    response => {
                        if (response.data.success == true) {
                            this.successAdded = true;
                            this.calendars.push(response.data.data);
                        }
                        // alert(response.data.posts);
                    }).catch(
                    (response) => console.log(response)
                );
            }
        },

    }
</script>