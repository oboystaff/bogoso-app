<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Application</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
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
                                        <label>Attachment</label>
                                        <input type="text" class="form-control" v-model="application.attachment" readonly>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label>Upload New CV</label><br />
                                        <input class="file" id="image" v-on:change="onFileChange" type="file" data-show-upload="false"
                                            data-theme="fa" data-max-file-count="" data-max-total-file-count=""
                                             data-initial-preview="" ref="file"
                                            data-initial-preview-config="" data-required="false" data-overwrite-initial="false"
                                            data-max-file-size="15000" data-browse-label="Browse"
                                            data-browse-icon="<i class='fa fa-folder-open'></i>" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true" 
                                                    style="margin-right: 5px"></i>Update</button>
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
    name: "update-application",
    data() {
        return {
            application: {
                id_number: "",
                name: "",
                email: "",
                phone: "",
                attachment: "",
                new_attachment: ""
            }
        }
    },
    mounted() {
        this.showApplication()
    },
    methods: {
        async showApplication() {
            await this.axios.get(`/api/application/show/${this.$route.params.id}`).then(response => {
                const { id_number, name, email, phone, attachment } = response.data.data
                this.application.id_number = id_number;
                this.application.name = name;
                this.application.email = email;
                this.application.phone = phone;
                this.application.attachment = attachment;
            }).catch(error => {
                console.log(error)
            })
        },
        async update() {
            let formData = new FormData();
            formData.append('id_number', this.application.id_number);
            formData.append('name', this.application.name);
            formData.append('email', this.application.email);
            formData.append('phone', this.application.phone);
            
            if (this.$refs.file.files.length > 0) {
                formData.append('attachment', this.application.new_attachment);
                formData.append('update_type', 'with_attachment');
            } else {
                formData.append('update_type', 'no_attachment');
            }
            
            await this.axios.post(`/api/application/update/${this.$route.params.id}`, formData,{
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
            this.application.new_attachment = e.target.files[0] || e.dataTransfer.files[0];
            console.log(this.application.new_attachment);
        },
    }
}
</script>