<template>
    <div class="login-form d-flex justify-content-center align-items-center w-100" >
        <div class="card">
        <div class="card-header"><img src="img/logo.png" alt=""></div>
        <div class="card-body">
            <p>{{loginFalledMassage}}</p>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" v-model="email" class="form-control">

            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" v-model="password" class="form-control">
            </div>
            <button class="btn btn-dark" @click="login">Login</button>
        </div>
    </div>
    </div>

</template>

<script>
import axios from "axios"
    export default {
        data() {
            return {
                email: '',
                password: '',
                userCard : {},
                loginFalledMassage: '',
            }
        },
        methods: {
            login() {
                this.userCard = {
                    email: this.email,
                    password: this.password,
                }
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/login', this.userCard).then(res => {
                        if(res.data.status == false){
                            this.loginFalledMassage = res.data.message
                            return;
                        }
                        window.laravel.isLoggedin = true
                        this.$router.push('/').catch(failure => {
                            console.log(failure)
                        })
                    }).catch(error =>{
                            console.log(error)
                    })
                });
            },

        },


    }
</script>

<style lang="scss" scoped>

</style>
