<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Application</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>ID Number</label>
                                    <input type="text" class="form-control" v-model="application.id_number" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="application.name" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" v-model="application.email" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" v-model="application.phone" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Upload Your CV Here</label><br />
                                    <input class="file" id="images" v-on:change="onFileChange" type="file" data-show-upload="false"
                                        data-theme="fa" data-max-file-count="" data-max-total-file-count=""
                                         data-initial-preview="" accept="application/pdf"
                                        data-initial-preview-config="" data-required="false" data-overwrite-initial="false"
                                        data-max-file-size="15000" data-browse-label="Browse"
                                        data-browse-icon="<i class='fa fa-folder-open'></i>" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true" 
                                                style="margin-right: 5px"></i>Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "add-application",
    data() {
        return {
            application: {
                id_number: "",
                name: "",
                email: "",
                phone: "",
                attachment: "",
            }
        }
    },
    methods: {
        async create() {
            let formData = new FormData();
            formData.append('id_number', this.application.id_number);
            formData.append('name', this.application.name);
            formData.append('email', this.application.email);
            formData.append('phone', this.application.phone);
            formData.append('attachment', this.application.attachment);

            await this.axios.post('/api/application', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                this.$router.push({ name: "applicationList" })
            }).catch(error => {
                console.log(error.response.data.errors);
            })
        },
        onFileChange(e) {
            this.application.attachment = e.target.files[0] || e.dataTransfer.files[0];
            console.log(this.application.attachment);
        },
    }
}
</script>