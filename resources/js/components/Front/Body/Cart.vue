<template>
    <div class="dropdown cart-dropdown">
        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
            <i class="minicart-icon"></i>
            <span class="cart-count" v-if="$store.state.cartCount>0">{{ $store.state.cartCount }}</span>
        </a>
    
        <div class="dropdown-menu" v-if="$store.state.cart.length>0">
            <div class="dropdownmenu-wrapper">
                <div class="dropdown-cart-header">
                                            <span>{{ $store.state.cart.length }} Livres</span>
    
                                            
                </div><!-- End .dropdown-cart-header -->
                <div class="dropdown-cart-products">
                    <div class="product" v-for="item in $store.state.cart" :key="item.id">
                        <div class="product-details">
                                                    <h4 class="product-title">
                                                        <a href="product.html">{{ item.titre }}</a>
                                                    </h4>
    
                                                    <span class="cart-product-info">
                                                        <span class="cart-product-qty">{{ item.quantity }}</span>
                                                        x ${{ item.price }}
                                                    </span>
                        </div><!-- End .product-details -->
    
                        <figure class="product-image-container">
                                                    <a href="product.html" class="product-image">
                                                        <img :src="item.images[0].images_livres" alt="product">
                                                    </a>
                                                    <a  @click="removeFromCart(item)" class="btn-remove" title="Remove Product"><i class="icon-retweet"></i></a>
                        </figure>
                    </div><!-- End .product -->
    
                                            
                </div><!-- End .cart-product -->
    
                <div class="dropdown-cart-total">
                    <span>Total</span>
    
                    <span class="cart-total-price">${{ totalPrice  }}</span>
                </div><!-- End .dropdown-cart-total -->
    
                <div class="dropdown-cart-action">
                    <a :href="'/cart'" class="btn btn-block">Commander</a>
                </div><!-- End .dropdown-cart-total -->
            </div><!-- End .dropdownmenu-wrapper -->
        </div><!-- End .dropdown-menu -->
    </div><!-- End .dropdown -->
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

    methods: {
        removeFromCart(item) {
            this.$store.commit('removeFromCart', item);
        }
    }
}
</script>

<style scoped>
.btn-remove{
    cursor: pointer;
}
</style>