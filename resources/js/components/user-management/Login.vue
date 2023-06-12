<style scoped>
@import 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css';
@import 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css';
@import '../../../assets/css/style.css';
</style>

<template>
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <form @submit.prevent="login">
                    <div class="AppForm shadow-lg">
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                <div class="AppFormLeft">

                                    <h1 style="margin-bottom: 20px;">Login Here</h1>
                                    <div class="form-group position-relative mb-4">
                                        <input type="text" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none" id="username"
                                            placeholder="Username" v-model="user.email">
                                            <i class="fa fa-user-o"></i>
                                    </div>
                                    <div class="form-group position-relative mb-4">
                                        <input type="password" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 shadow-none" id="password"
                                            placeholder="Password" v-model="user.password">
                                            <i class="fa fa-key"></i>
                                    </div>
                                    <span style="font-size:13px;color:red">{{ this.user.error }}</span>
                                    <div class="row  mt-4 mb-4">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-block shadow border-0 py-2 text-uppercase">
                                        Login
                                    </button>

                                    <p class="text-center mt-5">
                                        Don't have an account?
                                        <span>
                                            Contact your system admin
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="AppFormRight position-relative d-flex justify-content-center flex-column align-items-center text-center p-5 text-white">
                                    <h2 class="position-relative px-4 pb-3 mb-4">Welcome</h2>
                                    <p>Lorem ipsuing elit. Molomos totam est voluptatum i omos totam est voluptatum i ure sit consectetur ill</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</template>

<script>

export default {
    name: 'login',
    
    data() {
        return {
            user: {
                email: "",
                password: "",
                error: ""
            }
        }
    },
    methods: {
        async login() {
            await this.axios.post('/api/login', this.user).then(response => {
                if (response.status === 200 && response.data.data) {
                    this.$router.push({ name: "dashboard" });
                } 
            }).catch(error => {
                this.user.error = error.response.data.errors.email[0];
            })
        }
    }
}
</script>