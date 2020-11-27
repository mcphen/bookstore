<template>
  <div>
       <div class="container">
        <section class="product-panel">
                        <div class="section-title">
                            <h2>ACTUALITES</h2>
                        </div>
                        <div>
                            <div class="product-default inner-quickview inner-icon center-details">
                                <figure>
                                    <a href="product.html">
                                        <img src="{{url('/')}}/assets/images/products/grey/product-1.jpg">
                                    </a>
                                    <div class="btn-icon-group">
                                        <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i></button>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="category.html" class="product-category">category</a>
                                        </div>
                                    </div>
                                    <h2 class="product-title">
                                        <a href="product.html">Product Short Name</a>
                                    </h2>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="old-price">$59.00</span>
                                        <span class="product-price">$49.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                            
                        </div>
        </section>

                    
        </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>