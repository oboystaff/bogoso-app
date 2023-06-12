<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{ name: "userAdd" }' class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true" style="margin-right: 5px"></i>Create User</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>User</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="users.length > 0">
                                <tr v-for="(user, key) in users" :key="key">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>
                                        <router-link :to='{ name: "userEdit", params: { id: user.id } }'
                                            class="btn btn-success btn-sm"><i class="fa fa-edit" aria-hidden="true" 
                                                    style="margin-right: 5px"></i>Edit</router-link>
                                        <button type="button" @click="deleteUser(user.id)"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true" 
                                                style="margin-right: 5px"></i>Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No Users Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import "jquery/dist/jquery.min.js";
import "bootstrap/dist/css/bootstrap.min.css";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";

export default {
    name: "users",
    data() {
        return {
            users: []
        }
    },
    mounted() {
        this.getUsers()
    },
    methods: {
        async getUsers() {
            await this.axios.get('/api/user').then(response => {
                this.users = response.data.data

                setTimeout(() => {
                    $("#datatable").DataTable();
                });
            }).catch(error => {
                console.log(error)
                this.users = []
            })
        },
        deleteUser(id) {
            if (confirm("Are you sure to delete this user ?")) {
                this.axios.post(`/api/user/delete/${id}`).then(response => {
                    this.getUsers()
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
}
</script>