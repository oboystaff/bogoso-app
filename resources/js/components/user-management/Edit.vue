<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update User</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" v-model="user.name">
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" v-model="user.email">
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" v-model="user.password">
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label>Password Confirmation</label>
                                        <input type="password" class="form-control" v-model="user.password_confirmation">
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
    name: "update-user",
    data() {
        return {
            user: {
                name: "",
                email: "",
                password: "",
                password_confirmation: ""
            }
        }
    },
    mounted() {
        this.showUser()
    },
    methods: {
        async showUser() {
            await this.axios.get(`/api/user/show/${this.$route.params.id}`).then(response => {
                const { name, email } = response.data.data;
                this.user.name = name;
                this.user.email = email;
            }).catch(error => {
                console.log(error)
            })
        },
        async update() {
            await this.axios.post(`/api/user/update/${this.$route.params.id}`, this.user).then(response => {
                this.$router.push({ name: "userList" })
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>