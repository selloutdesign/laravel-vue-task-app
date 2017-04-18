
<template>
    <div>
        <h1>My Tasks</h1>
        <h4>New Task</h4>
        <form action="#" @submit.prevent="edit ? updateTask(task.id) : createTask()">
            <div class="input-group">
                <input v-model="task.body" ref="taskinput" type="text" name="body" class="form-control" autofocus>
                <span class="input-group-btn">
                    <button v-show="!edit" type="submit" class="btn btn-primary">New Task</button>
                    <button v-show="edit" type="submit" class="btn btn-primary">Edit Task</button>
                </span>
            </div>
        </form>
        <h4>All Tasks</h4>
        <ul class="list-group">
            <li class="list-group-item" v-for="task in list">
                {{ task.body }}
                <button @click="showTask(task.id)" class="btn btn-primary btn-xs">Edit</button>
                <button @click="deleteTask(task.id)" class="btn btn-danger btn-xs">Delete</button>
            </li>
        </ul>
    </div>
</template>
<script>

    export default {
        data() {
            return {
                edit: false,
                list: [],
                task: {
                    id: '',
                    body: ''
                }
            }
        },
        
        mounted() {
            this.fetchTaskList();
        },
        
        methods: {
            fetchTaskList: function() {
                axios.get('api/tasks').then((response) => {
                    console.log(response.data);
                    this.list = response.data;
                    
                })
                .catch(function (err) {
                    console.log(err);
                });
            },

            createTask: function () {
                var self = this;
                let params = Object.assign({}, self.task);
                console.log(self.task);
                console.log(token);
                axios.post('api/task/store', params)
                .then(function (res) {
                    console.log(res);
                })
                .catch( function (err) {
                    console.log(err);
                });
                self.task.body = ''
                self.edit = false
                self.fetchTaskList()
            },

            updateTask: function(id) {
                var self = this;
                let params = Object.assign({}, self.task);
                axios.patch('api/task/' + id, params)
                .then(function (response) {
                    console.log(response);
                })
                .catch(function(err) {
                    console.log(err);
                });
                
                self.task.body = ''
                self.edit = false
                self.fetchTaskList()
            },

            showTask: function(id) {
                var self = this;
                axios.get('api/task/' + id)
                .then(function(response) {
                    self.task.id = response.data.id
                    self.task.body = response.data.body
                })
                self.$refs.taskinput.focus()
                self.edit = true
            },

            deleteTask: function (id) {
                axios.delete('api/task/' + id)
                .then(function(res) {
                    console.log(res);
                })
                .catch(function (err) {
                    console.log(err);
                });
                this.fetchTaskList();
            },
        }
    }
</script>