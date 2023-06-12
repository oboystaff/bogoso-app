<template>
        <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{ name: "applicationAdd" }' class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true" style="margin-right: 5px"></i>Create New Application</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Applications</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID Number</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="applications.length > 0">
                                <tr v-for="(application, key) in applications" :key="key">
                                    <td>{{ application.id }}</td>
                                    <td>{{ application.id_number }}</td>
                                    <td>{{ application.name }}</td>
                                    <td>{{ application.email }}</td>
                                    <td>{{ application.phone }}</td>
                                    <td>
                                        <router-link :to='{ name: "applicationEdit", params: { id: application.id } }'
                                            class="btn btn-success btn-sm"><i class="fa fa-edit" aria-hidden="true" 
                                                style="margin-right: 5px"></i>Edit</router-link>
                                        <button type="button" @click="deleteApplication(application.id)"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true" 
                                            style="margin-right: 5px"></i>Delete</button>
                                        <button type="button" @click="downloadCV(application.id, application.name)" 
                                        class="btn btn-primary btn-sm"><i class="fa fa-download" aria-hidden="true" 
                                        style="margin-right: 5px"></i>Download CV</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No Applications Found.</td>
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
    name: "applications",
    data() {
        return {
            applications: []
        }
    },
    mounted() {
        this.getApplications()
    },
    methods: {
        async getApplications() {
            await this.axios.get('/api/application').then(response => {
                this.applications = response.data.data;
                
                setTimeout(() => {
                    $("#datatable").DataTable();
                });
                console.log(response.data);
            }).catch(error => {
                console.log(error)
                this.applications = []
            })
        },
        deleteApplication(id) {
            if (confirm("Are you sure you want to delete this application ?")) {
                this.axios.post(`/api/application/delete/${id}`).then(response => {
                    this.getApplications();
                }).catch(error => {
                    console.log(error.response.data.errors);
                })
            }
        },
        downloadCV(id, name) {
            if (confirm("Are you sure you want to download this application ?")) {
                this.axios.get(`/api/application/download/${id}`).then(response => {
                    var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                    var fileLink = document.createElement('a');
                    fileLink.href = fileURL;
                    fileLink.setAttribute('download', name+'_CV.pdf');
                    document.body.appendChild(fileLink);
                    fileLink.click();
                }).catch(error => {
                    console.log(error.response.data.errors);
                });
            }
        }
    }
}
</script>