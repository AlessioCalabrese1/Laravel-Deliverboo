<template>
    <section>
        <!-- jumbo -->
        <div class="jumbo">
            <img :src="restaurant.restaurantPic" :alt="restaurant.name + 'photo'">
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
                    <div class="menu-container m-0 my-rounded py-4 px-lg-5 ">
                        <h3 class="text-capitalize border-bottom py-4 m-0">menu</h3>
                        <div class="row mt-5">
                            <div class="col-12 col-md-4 mb-4 mt-0" v-for="dish in restaurant.dishes" :key="dish.id">
                                <div class="dish-card row d-flex align-items-end flex-wrap mx-auto my-shadow" :class="dish.visible == 1 ? 'grey-filter' : ''">
                                    <div class="col-12 img-container ">
                                        <img class="img-fluid image" :src="checkUrl(dish.dishPic)" :alt="dish.name">
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

                                    <div class="d-flex justify-content-between align-items-center w-100 pt-2 pb-4 pr-4 pl-4">
                                        <h4 class="text-left font-weight-bold text-capitalize p-0 m-0">
                                            <span class="euro">€ </span>{{ dish.price }}
                                        </h4>
                                        <div class="add-button-container" @click="addToCart(dish)" :class="dish.visible==1 ? 'd-none' : ''">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carrello -->
                <div class="col-lg-4 col-12">
                    <div class="menu-container m-0 my-rounded py-4 px-5 mx-auto ">
                        <div class="row border-bottom align-items-center">
                            <div class="col-8">
                                <h3 class="text-capitalize  py-4 m-0"><i class="fa-solid fa-cart-shopping"></i>
                                    cart
                                </h3>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-danger rounded-pill" @click="clearCart()" id="clear">Clear
                                    Cart</button>
                            </div>
                        </div>
                        <div class="row bg-white my-shadow my-rounded mt-5">
                            <div class="col-12  p-5">
                                <div class="row cart">
                                    <div class="col-12 restaurant-in-cart">
                                        <h3>Your Order :</h3>
                                    </div>
                                    <div class="col-12">
                                        <div class="row border-bottom py-2" v-for="(cartItem , index) in cart"
                                            :key="index">

                                            <div class="col-8 text-capitalize">
                                                {{ cartItem.name }}
                                            </div>
                                            <div class="col-3">
                                                € {{ cartItem.price }}
                                            </div>
                                            <div class="col-1 trash" @click='deleteSingleDish(cartItem, index)'>
                                                <i class="fa-solid fa-trash-can"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" :class="length==0 ? 'd-none' : '' ">
                                    <div class="col-8 text-capitalize">
                                        total:
                                    </div>
                                    <div class="col-4">
                                        €{{ total }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary">invia</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import axios from 'axios'

    export default {
        data: function () {
            return {
                restaurant: {},
                cart: [],
                counter: 0,
                total: 0,
                length:0
            };
        },
        methods: {
            getRestaurant() {
                axios.get(`http://127.0.0.1:8000/api/restaurant/${this.$route.params.id}`)
                    .then((response) => {
                        this.restaurant = response.data.results;
                        this.cart = JSON.parse(localStorage.getItem("cart"));
                        this.length = this.cart.length
                        this.total = localStorage.getItem("total")
                    }).catch((error) => {
                        console.warn(error);
                    });
            },

            //! funzione che pusha in un array i piatti selezionati e li carica sul local storage
            addToCart(dish) {
                //? fixa il local storage al primo avvio o al clear in quanto risulta null
                if (this.cart == null) {
                    this.cart = []
                }

                //? se il carrello e' vuoto pusha il piatto
                if (this.cart.length == 0) {
                    this.cart.push(dish)
                    this.length++
                    localStorage.setItem("cart", JSON.stringify(this.cart));

                }
                //!  se il carrello non e' vuoto controlliamo che stiamo ordinando dallo stesso ristorante in caso contrario resettiamo il cart e pushamo il piatto
                else if (this.cart[0].restaurant_id != this.$route.params.id) {
                    const result = window.confirm(
                        'If you click add here we\'ll clear your cart, because our policy says "you can order from only one restaurant", Are you sure?'
                        )
                    if (result) {
                        this.cart = []
                        localStorage.clear();
                        this.cart.push(dish)
                        this.length++
                        localStorage.setItem("cart", JSON.stringify(this.cart));
                    }
                }
                //! pushamo il piatto aggiuntivo
                else {
                    this.cart.push(dish)
                    this.length++
                    localStorage.setItem("cart", JSON.stringify(this.cart));
                }

                this.total = this.total+dish.price
                localStorage.setItem('total', this.total)

            },

            //! clear del carrello
            clearCart() {
                //!popup per la conferma della cancellazione
                if (this.cart != null && this.cart.length > 0) {
                    const result = window.confirm('Are you sure?')
                    if (result) {
                        this.cart = []
                        localStorage.clear();
                        this.total = 0
                        this.length= 0
                    }
                } else {
                    const alert = window.alert('No item on cart')
                }
            },
            deleteSingleDish(dish, id) {
                console.log(dish)
                this.cart.splice(id, 1)
                this.length--
                localStorage.clear();
                localStorage.setItem("cart", JSON.stringify(this.cart));
                if(this.cart.length!=0){
                    this.total = this.total - dish.price
                }
                else{
                    this.total = 0
                }
                

            },

            //! funzione che controlla il path delle immagini se sono link o immagini caricate
            checkUrl(img) {
                console.log()
                if (img.includes('http')) {
                    return img
                } else {
                    return '/storage/' + img
                }
            },

        },
        created() {
            this.getRestaurant();
        },
    }
</script>

<style lang="scss" scoped>
    @import '../../sass/variables';

    /* .menu-container{
  row-gap: 35px;
}
.banner-container{
  img{
    border-radius: 30px;
    width: 100%;
  }
  width: 1266px;
  margin: 0 auto;
} */

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
    .grey-filter{
        filter: grayscale(100%);
        opacity: 0.5;
    }
</style>