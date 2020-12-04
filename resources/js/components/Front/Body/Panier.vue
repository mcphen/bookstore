<template>
  <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table-container">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th class="product-col">Product</th>
                                        <th class="price-col">Price</th>
                                        <th class="qty-col">Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="product-row" v-for="item in $store.state.cart" :key="item.id">
                                        <td class="product-col">
                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img :src="item.images[0].images_livres" alt="product">
                                                </a>
                                            </figure>
                                            <h2 class="product-title">
                                                <a href="product.html">{{ item.titre }}</a>
                                            </h2>
                                        </td>
                                        <td>${{ item.price }}</td>
                                        <td>
                                            <button >-</button> <strong>{{ item.quantity }}</strong> <button >+</button>
                                        </td>
                                        <td>${{ item.price*item.quantity }}</td>
                                        <td>
                                            <div class="float-right">
                                               
                                                <a href="#" @click="removeFromCart(item)"  title="Remove product" class="btn-remove"><span class="sr-only">Remove</span></a>
                                            </div>
                                        </td>
                                    </tr>
                                    

                                   
                                </tbody>

                                
                            </table>
                        </div><!-- End .cart-table-container -->

                        
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h3>Summary</h3>

                            

                            

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>${{ totalPrice  }}</td>
                                    </tr>

                                    <tr>
                                        <td>Tax</td>
                                        <td>$0.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Order Total</td>
                                        <td>${{ totalPrice  }}</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="checkout-methods">
                                <a :href="'/identification'" class="btn btn-block btn-sm btn-primary">Terminer la commande</a>
                               
                            </div><!-- End .checkout-methods -->
                        </div><!-- End .cart-summary -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
</template>

<script>
export default {


    computed: {
            totalPrice() {
                let total = 0;

                for (let item of this.$store.state.cart) {
                    total += item.totalPrice;
                }

                return total.toFixed(2);
            }
    },

    data(){
        return{
            quantity:0
        }
    },

    methods: {
        removeFromCart(item) {
            this.$store.commit('removeFromCart', item);
        }
    }

        
}
</script>

<style>

</style>