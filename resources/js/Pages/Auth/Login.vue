<script setup>
import Nav from "../../Components/Nav.vue"
import Login from "../../Components/login.vue"
import Footer from "../../Components/Footer.vue"
import RegisterC from "../../Components/RegisterC.vue";
import { onMounted, ref } from 'vue'

let login_ = ref(true)
let register_ = ref(false)

function register() {
  login_.value = false
  console.log("register")
  register_.value = true
}
function login() {
  register_.value = false
  console.log("login");
  login_.value = true
}
</script>
<template>
  <Nav />
  <div class="flex justify-center">
    <div class="flex ">
      <button id="loginButton" class="buttonc login-button" @click="login">Login</button>
      <button id="registerButton" class="buttonc register-button" @click="register">Register</button>
    </div>
  </div>
  <div v-show="login_">
    <Login />
  </div>
  <div v-show="register_">
    <RegisterC />
  </div>
  <Footer />
</template>

<style>
#app {
  background-color: beige;
}

.input-field {
  border: none;
  border-bottom: 1px solid #b0afaf;
  font-size: 12px;
  outline: none;
  background: transparent;
  padding: 2px 0;
  width: 100%;
}

.left-section {
  background-color: #E85454;
  border-radius: 15px 0px 0px 15px;
  align-items: center;
  box-shadow: rgba(0.6, 0.6, 0.6, 0.6) 0px 30px 90px;
}

.buttonc {
  font-size: 14px;
  padding: 10px 100px 10px 100px;
  color: #000000;
  cursor: pointer;
}

.login-button {
  border-right: 2px solid #000000;
  border-bottom: 3px solid #000000;
}

.register-button {
  border-left: 2px solid #000000;
  border-bottom: 3px solid #000000;
}

.login-button:hover,
.register-button:hover {
  background-color: #757c81;
}

.login-button,
.register-button {
  border-radius: 0;
}

.right-section {
  background-color: #274156;
  border-radius: 0px 15px 15px 0px;
  box-shadow: rgba(0.6, 0.6, 0.6, 0.6) 0px 30px 90px;
}

.radio-group input[type="radio"] {
  display: none;
}

.radio-group input[type="radio"]+label:before {
  content: '';
  display: inline-block;
  width: 15px;
  height: 15px;
  border: 2px solid #fff;
  border-radius: 50%;
  background-color: transparent;
}

.radio-group input[type="radio"]:checked+label:before {
  background-color: #E85454;
}
</style>
