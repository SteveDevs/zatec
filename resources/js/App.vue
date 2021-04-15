<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link v-if="loggerIn" to="/user/user-products" class="nav-item nav-link">Products</router-link>
                    <router-link v-if="loggerIn" to="/user/user-topup" class="nav-item nav-link">Topup</router-link>
                    <router-link v-if="loggerIn" to="/user/user-transactions" class="nav-item nav-link">Transactions</router-link>
                    <router-link to="/user/user-login" class="nav-item nav-link">Login</router-link>
                    <button v-if="loggerIn" v-on:click="logout()" class="nav-item nav-link">Logout</button>
                    <router-link to="/user/user-register" class="nav-item nav-link">Register</router-link>
                </div>
            </div>
        </nav>

        <router-view> </router-view>
    </div>
</template>
 
<script type="text/javascript">

    export default{
        data() {
            return {
                loggerIn: []
            }
        },
        created() {
            this.loggerIn = localStorage.getItem('usertoken');
        },
        methods:{
            logout(){
                this,axios.post('http://localhost:8000/api/logout').then(response => {
                localStorage.removeItem('usertoken');
                localStorage.removeItem('userId');
                    location.reload();
                }).catch(error => {
                    location.reload();
                });
            }
        }
    }
</script>