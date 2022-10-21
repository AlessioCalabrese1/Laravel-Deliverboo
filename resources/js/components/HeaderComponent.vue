<template>
    <header class="position-fixed w-100 border-bottom">
        <div class="position-relative w-100">
            <div class="container-lg ">
                <div class="row justify-content-between px-md-0 px-2 align-content-center">
                    <div class="col-4">
                        <router-link :to="{ name: 'home' }" >
                            <img src="https://cdn.discordapp.com/attachments/1027584701415833620/1030102818239041627/deliveboo-logo-desktop.png" 
                            alt="logo image" class="d-md-block d-none">
                            <img src="https://cdn.discordapp.com/attachments/1027584701415833620/1030102849801179208/deliveboo-logo-mobile.png" alt="logo image" class="d-md-none"></img>
                        </router-link>
                    </div>
                    <!-- hamburger menu -->
                    <div class="col-3 d-md-none d-flex justify-content-end" @click="changeStatusHamburger(), setTimeoutfunction()">
                        <div id="menuToggle">
                            <input type="checkbox" />
                            <span id="span1"></span>
                            <span id="span2"></span>
                            <span id="span3"></span>
                        </div>
                    </div>
                    <!-- bottoni in desktop -->
                    <div class="col-4 d-none d-md-flex align-items-center justify-content-end">
                        <div class="row w-75 justify-content-end">
                            <div class="col-8 nav-item my-btn rounded-pill py-1 px-4 my-btn-shadow text-center">
                                <a href="/login" class="nav-link text-white px-0 ">Personal Area</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- menu che appare al click dell'hamburger -->
                <div class="row flex-column my-dropdown py-3 w-50" :class="isClicked=== true ? 'd-flex fade-in-top' : isFirst()">

                    <div class="col-12 nav-item my-btn rounded-pill py-1 px-4 my-btn-shadow mt-2 mt-md-0 text-center">
                        <a href="/login" class="nav-link text-white px-0 ">Personal Area</a>
                    </div>
                </div>
        </div>
    </header>
</template>

<script>
    export default {
        data:function() {
            return {
                isClicked: false,
                first: 0,
                class: 'fade-out-top'
            }
        },
        methods: {
            changeStatusHamburger(){
                this.first++
                this.isClicked = !this.isClicked
            },
            isFirst(){
                if(this.first == 0){
                    return 'd-none'
                }
                else{
                    return this.class
                }
            },
            setTimeoutfunction(){
                if(this.isClicked==false){ 
                    setTimeout(() => {
                        this.class='d-none'
                    }, 700);
                }
            }
        },
    }
</script>
 <style scoped lang="scss">
 @import '../../sass/variables';

    header{
        background-color: $backgroundColor;
    }
    
    #menuToggle {
        overflow: hidden;
        position: absolute;
        width: 57px;
        height: 57px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #menuToggle input {
    display: flex;
    width: 57px;
    height: 57px;
    position: absolute;
    cursor: pointer;
    opacity: 0; /* hide input */
    z-index: 1; /* top of the menu */
    }

    #menuToggle span{
        width: 52px;
        height: 5px;
        margin-bottom: 10px;
        background: $primaryColor;
        border-radius: 4px;
        -webkit-transition: all .5s cubic-bezier(.08,.81,.87,.71);
        -moz-transition: all .5s cubic-bezier(.08,.81,.87,.71);
        -ms-transition: all .5s cubic-bezier(.08,.81,.87,.71);
        -o-transition: all .5s cubic-bezier(.08,.81,.87,.71);
        transition: all .5s cubic-bezier(.08,.81,.87,.71);
    }

    #span1 {
    transform-origin: 7px 0px;
    }

    #span3 {
    transform-origin: bottom right;
    }

    #menuToggle input:checked ~ #span1 {
    background-color: $primaryColor;
    transform: rotate(45deg) translate(6px);
    }
    #menuToggle input:checked ~ #span2 {
    background-color: $primaryColor;
    transform: rotate(495deg) translate(4px);   
    }
    #menuToggle input:checked ~ #span3 {
    background-color: $primaryColor;
    transform: rotate(45deg);
    opacity: 0;
    }

    /* animzione nella tendina entrata */
    .fade-in-top {
	-webkit-animation: fade-in-top 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
	animation: fade-in-top 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
    }
    @-webkit-keyframes fade-in-top {
    0% {
        -webkit-transform: translateY(-50px);
                transform: translateY(-50px);
        opacity: 0;
    }
    100% {
        -webkit-transform: translateY(0);
                transform: translateY(0);
        opacity: 1;
    }
    }
    @keyframes fade-in-top {
    0% {
        -webkit-transform: translateY(-50px);
                transform: translateY(-50px);
        opacity: 0;
    }
    100% {
        -webkit-transform: translateY(0);
                transform: translateY(0);
        opacity: 1;
    }
    }

    /* animzione nella tendina entrata */
    .fade-out-top {
	-webkit-animation: fade-out-top 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	animation: fade-out-top 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }   
    @-webkit-keyframes fade-out-top {
    0% {
        -webkit-transform: translateY(0);
                transform: translateY(0);
        opacity: 1;
    }
    100% {
        -webkit-transform: translateY(-50px);
                transform: translateY(-50px);
        opacity: 0;
    }
    }
    @keyframes fade-out-top {
    0% {
        -webkit-transform: translateY(0);
                transform: translateY(0);
        opacity: 1;
    }
    100% {
        -webkit-transform: translateY(-50px);
                transform: translateY(-50px);
        opacity: 0;
    }
    }
  
    
    /* dropdown */
    .my-dropdown{
        position: absolute;
        right: 30px;
        bottom: -80px;
    }
    header{
        z-index: 3;
        height: 105.25px;
        display: flex;
        align-items: center;
        img{
            height: 41.25px;
        }
    }

 </style>
