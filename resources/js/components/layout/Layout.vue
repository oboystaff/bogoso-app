
<template>
    <main style="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link to="/" class="navbar-brand" href="#">Future Global Resources Bogoso Prestea Limited
                    (FGRBPL)</router-link>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link exact-active-class="active" to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
                        <router-link exact-active-class="active" to="/user" class="nav-item nav-link">User</router-link>
                        <router-link exact-active-class="active" to="/application"
                            class="nav-item nav-link">Application</router-link>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>
 
<script>
export default {}
</script>