<script setup>
import Nav from "../Components/Nav.vue"
import RegisterC from "../Components/RegisterC.vue"
import Footer from "../Components/Footer.vue"
import { initFlowbite } from 'flowbite'
import { onMounted,ref } from 'vue'


onMounted(() => {
    initFlowbite();
})
</script>

<template>
  <Nav />
  <RegisterC />
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

.header-button1 {
  background-color: #354D60;
  font-size: 14px;
  padding: 5px 15px 5px 15px;
  border-radius: 15px 0px 0px 15px;
  box-shadow: rgba(0.6, 0.6, 0.6, 0.6) 0px 30px 90px;
}

.header-button2 {
  background-color: #E85454;
  font-size: 14px;
  padding: 5px 5px 5px 5px;
  border-radius: 0px 15px 15px 0px;
  box-shadow: rgba(0.6, 0.6, 0.6, 0.6) 0px 30px 90px;
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
  width: 13px;
  height: 13px;
  border: 2px solid #fff;
  border-radius: 50%;
  background-color: transparent;
  margin-right: 8px;
}

.radio-group input[type="radio"]:checked+label:before { background-color: #E85454; }

.button { border-radius: 10px; }
</style>
