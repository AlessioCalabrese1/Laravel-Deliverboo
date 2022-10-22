<template>
    <section>
        <!-- jumbo -->
        <div class="jumbo">
            <img :src="restaurant.restaurantPic" :alt="restaurant.name + 'photo'" />
        </div>
        <!-- restaurant name -->
        <div class="container-lg py-4">
            <h1 class="text-center my-4">
                {{ restaurant.name }}
            </h1>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- Menu -->
                <div class="col-lg-8 col-12">
                    <div class="menu-container m-0 my-rounded py-4 px-lg-5">
                        <h3 class="text-capitalize border-bottom py-4 m-0">menu</h3>
                        <div class="row mt-5">
                            <div class="col-12 col-md-4 mb-4 mt-0" v-for="dish in restaurant.dishes" :key="dish.id">
                                <div class=" dish-card row align-items-end flex-wrap mx-auto my-shadow"
                                    :class="dish.visible == 1 ? 'grey-filter' : ''">
                                    <div class="col-12 img-container">
                                        <img class="img-fluid image" :src="checkUrl(dish.dishPic)" :alt="dish.name" />
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center w-100 pt-4 pb-2 pr-4 pl-4">
                                        <div>
                                            <h2 class="text-left font-weight-bold col-12 text-capitalize p-0">
                                                {{ dish.name }}
                                            </h2>

                                            <p class="m- pb-2"> {{ dish.description }}</p>
                                            <hr>
                                        </div>
                                    </div>

                                        <div class="add-button-container mx-3 mb-3" @click="insertToCart(dish), getTotal()"
                                            :class="dish.visible == 1 ? 'd-none' : ''">
                                            <div class="add-button">+</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carrello -->
                <div class="col-lg-4 col-12">
                    <div class="menu-container m-0 my-rounded py-4 px-lg-5 mx-auto">
                        <div class="row border-bottom align-items-center">
                            <div class="col-8">
                                <h3 class="text-capitalize py-4 m-0">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    cart
                                </h3>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-danger rounded-pill" @click="clearCart()" id="clear">
                                    Clear Cart
                                </button>
                            </div>
                        </div>
                        <div class="row bg-white my-shadow my-rounded mt-5">
                            <div class="col-12 p-5">
                                <!-- Piatti ordinati -->
                                <div class="row cart">
                                    <div class="col-12 restaurant-in-cart">
                                        <h3>Your Order :</h3>
                                    </div>
                                    <div class="col-12">
                                        <div class="row border-bottom py-2" v-for="(cartItem, index) in newCart"
                                            :key="index">
                                            <div class="col-5 text-capitalize">
                                                {{ cartItem.name }}
                                            </div>
                                            <div class="col-1 p-0 text-center" @click="subtractionDish(cartItem, index)">
                                                <i class="fa-solid fa-minus"></i>
                                            </div>
                                            <div class="col-1 p-0 text-center">
                                              x{{ cartItem.quantity }}
                                            </div>
                                            <div class="col-1 p-0 text-center" @click="moreDish(cartItem)">
                                                <i class="fa-solid fa-plus"></i>
                                            </div>
                                            <div class="col-3 text-center">€ {{ cartItem.price }}</div>
                                            <div class="col-1 trash" @click="deleteSingleDish(index)">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-4" >
                                    <div class="col-8 text-capitalize">total:</div>
                                    <div class="col-4">€{{ getTotal() }}</div>
                                </div>
                                <!-- form -->
                                <div class="row form-group w-100">
                                  <form action="" method="" class="w-100" @submit.prevent>
                                    <div class="col-12 py-3">
                                      <h5>Your info :</h5>
                                    </div>
                                    <div class="col-12 mb-3">
                                      <input type="text" class="border-0 my-rounded bg-light w-100 px-4 py-2 form-control" placeholder="Name*" required v-model="orderName" >
                                    </div>
                                    <div class="col-12 mb-3">
                                      <input type="text" class="border-0 my-rounded bg-light w-100 px-4 py-2 form-control" placeholder="Surname*" required v-model="orderSurname">
                                    </div>
                                    <div class="col-12">
                                      <textarea class="form-control border-0 px-4 font-weight-lighter" placeholder="Add some comment, it will help us with the delivery" name="description" rows="3" v-model="orderComment"></textarea>
                                    </div>
                                    <div class="col-12 text-center py-3">
                                      <input type="submit" value="Checkout" class="btn btn-info rounded-pill" @click="sendOrder()">
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import axios from "axios";

    export default {
        data: function () {
            return {
                restaurant: {},
                newCart:[],

                orderName : '',
                orderSurname: '',
                orderComment: '',
                orderJson : {}
            };
        },
        methods: {
            getRestaurant() {
                axios
                    .get(`http://127.0.0.1:8000/api/restaurant/${this.$route.params.id}`)
                    .then((response) => {
                        this.restaurant = response.data.results;
                        this.length = this.cart.length;
                    })
                    .catch((error) => {
                        console.warn(error);
                    });
            },
            //! clear del carrello
            clearCart() {
                //!popup per la conferma della cancellazione
                console.log(this.orderJson)
                if (this.newCart != null && this.newCart.length > 0) {
                    Vue.swal({
                        title: "Are you sure?",
                        showDenyButton: true,
                        confirmButtonText: "Yes",
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            this.newCart = [];
                            localStorage.clear();
                            Swal.fire("Saved!", "", "success");
                        }
                    });
                } else {
                    Vue.swal("No item in cart");
                }
            },

            //! funzione che cancella il singolo piatto del carrello
            deleteSingleDish(id) { 
                this.newCart.splice(id, 1)
                this.setInCart() 
            },

            //! funzione che controlla il path delle immagini se sono link o immagini caricate
            checkUrl(img) {
                if (img.includes("http")) {
                    return img;
                } else {
                    return "/storage/" + img;
                }
            },

            //! funzione per inviare l'ordine al backoffice
            sendOrder(){
                this.orderJson ={'name': this.orderName, 'surname': this.orderSurname, 'comment': this.orderComment, 'total': this.getTotal()}
                axios.post(`http://127.0.0.1:8000/api/storeOrder`,{
                    data:[this.newCart, this.orderJson]
                }).then((response) => {
                    console.warn(response)
                }).catch((error) => {
                    console.error(error)
                })
            },

            getCurrentID(dish){
                return this.newCart.findIndex((element)=>element.id == dish.id)
            },

            // una volta ottenuto l'id dobbiamo caricare il singolo piatto
            insertToCart(dish){
                dish.quantity = 1
                let currentIndex=this.getCurrentID(dish)
                if(this.newCart.length > 0){ 
                    if(this.checkOnUrl()){
                        Vue.swal({
                            title: 'You can order from only one restaurant, are you sure to clear the cart?',
                            showCancelButton: true,
                            confirmButtonText: 'Yes',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.newCart = [];
                                    localStorage.clear();
                                    this.newCart.push({quantity: 1, ...dish})
                                    localStorage.setItem("cart", JSON.stringify(this.cart));
                                }
                            }) 
                    }
                    else if(currentIndex >=0 ){
                        this.newCart[currentIndex].quantity++
                    }
                    else{
                        this.newCart.push({quantity: 1, ...dish})
                    }         
                }
                else{
                    
                    this.newCart.push({quantity: 1, ...dish})
                }
                this.setInCart()
            },
            getLocalStorage(){
                if(JSON.parse(localStorage.getItem("newCart")) == null){
                    this.newCart=[]
                }
                else{
                    this.newCart = JSON.parse(localStorage.getItem("newCart"));
                }
            },
            setInCart(){
                localStorage.setItem("newCart", JSON.stringify(this.newCart));
            },
            checkOnUrl(){
                if(this.newCart[0].restaurant_id != this.$route.params.id){
                    return true
                }
                else{
                    return false
                }
            },
            getTotal(){
                let total = this.newCart.reduce((acc, item) => acc + item.price * item.quantity, 0)
                total = Math.round(total * 100) / 100
                return total
            },
            moreDish(dish){
                dish.quantity++
                console.log('la quantita e' + dish.quantity)
                if(dish.quantity>25){
                    Vue.swal('25 maybe is to much') 
                    dish.quantity--
                }
                else{
                    localStorage.setItem("cart", JSON.stringify(this.cart));
                }
            },
            subtractionDish(dish, id){
                dish.quantity--
                if(dish.quantity == 0){
                    this.deleteSingleDish(id)
                }
            },

        },
        created() {
            this.getRestaurant();
            this.getLocalStorage();
            
        },
    };
</script>

<style lang="scss" scoped>
    @import "../../sass/variables";

    .jumbo {
        height: 400px;
        width: 100%;

        img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
    }

    .container-lg {
        h1 {
            font-weight: 600;
        }
    }

    .menu-container {
        width: 95%;

        h3 {
            font-size: 2rem;
            font-weight: 600;
            color: $secondaryColor;
        }
    }

    .cart {
        height: 200px;
        overflow-y: scroll;

        &:hover::-webkit-scrollbar-thumb {
            background-color: $primaryColor;
            border-radius: 10px;
        }

        &::-webkit-scrollbar {
            width: 10px;
            height: 8px;
        }

        /* Handle */
        &::-webkit-scrollbar-thumb {
            background: $primaryColor;
            border-radius: 5px;
        }
    }

    .dish-card {
        background-color: white;
        border-radius: 30px;
        width: 98%;
    }

    .euro {
        color: $primaryColor;
    }

    .img-container {
        padding: 0;
        margin: 0;
        width: 334px;
        height: 250px;

        .image {
            object-fit: contain;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            height: 100%;
            width: 100%;
        }
    }

    .add-button-container {
        background-color: green;
        color: white;
        font-size: 25px;
        border-radius: 50%;
        height: 40px;
        width: 40px;
        text-align: center;
        line-height: 40px;
        cursor: pointer;

        i{
            font-size: 1.3rem;
        }
    }

    .trash {
        cursor: pointer;
    }

    .grey-filter {
        filter: grayscale(100%);
        opacity: 0.5;
    }

    .form-container{
      input{
        border:none;
      }
    }
</style>