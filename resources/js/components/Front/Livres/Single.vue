<template>
    <div class="container">
       
    <div class="row" v-if="livre!=null">
        {{ livre.length }}
        <div class="col-lg-12">
            <div class="product-single-container product-single-default">
                <div class="row" >
                    <div class="col-lg-4 col-md-4 product-single-gallery">
                        <div class="product-slider-container" v-if="livre.images.length>0" >
                            
                                <VueSlickCarousel ref="c1"
                                    :asNavFor="$refs.c2"
                                    :focusOnSelect="true">
                                <div v-for="img in livre.images" :key="img.id"> 
                                    <img :src="img.images_livres" :class="'image_carroussel'"/>
                                </div>
                                
                                </VueSlickCarousel>

                                <VueSlickCarousel
                                    ref="c2"
                                    :asNavFor="$refs.c1"
                                    :slidesToShow="4"
                                    :focusOnSelect="true">
                                    <div v-for="img in livre.images" :key="img.id" >
											<img :src="img.images_livres" class="carroussel_img"/>
									</div>
                                </VueSlickCarousel>
                                
                                
                                
                            
                            
                        </div>

                        
                        
                    </div><!-- End .col-lg-7 -->

                    <div class="col-lg-6 col-md-6 product-single-details" >
                       
                        <h1 class="product-title">{{livre.titre}}</h1>
                        <div class="ratings-container">
							<span v-for="auteur in livre.auteurs" :key="auteur.id"> <a href="#">{{ auteur.utilisateur.firstname }} {{ auteur.utilisateur.name }}</a>   </span>
						</div>
                        

                        

                        <div class="price-box">
                            
                            <span class="product-price">${{livre.price}}</span>
                        </div><!-- End .price-box -->

                        <div class="product-action">
                                    
                                    
                                    <a   class="paction add-cart btn_cart" @click="addToCart(livre)" title="Add to Cart">
                                        Ajouter au panier
                                    </a>
                                   
                        </div><!-- End .product-action -->

                        <div class="product-single-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                                    </li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                        <div class="product-desc-content" v-html="livre.description">
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- End .tab-pane -->
            
                                </div><!-- End .tab-content -->
                            </div><!-- End .product-single-tabs -->

                        
                        
                        

                        
                    </div><!-- End .product-single-details -->

                    
                </div><!-- End .row -->
            </div><!-- End .product-single-container -->

        </div><!-- End .col-lg-9 -->

        <div class="sidebar-overlay"></div>
        <div class="sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
        
    </div><!-- End .row -->

   
    </div>
</template>

<script>

export default {

   
    
    data () {
        return {
            livre:null,
            
            settings:{
                dots: true,
                dotsClass: "slick-dots custom-dot-class",
                adaptiveHeight: true,
                edgeFriction: 0.35,
                infinite: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                mobileFirst: true,
               /* autoplay:true,*/
                responsive: [
                    {
                        
                        settings: {            
                        arrows: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        }
                    }
                ]
            },

            sliderOptions: {
                
                arrows: true,
                
                slidesToShow: 4,
                slidesToScroll: 4,
                centerPadding : '75px',
                breakpoint: 400,
                responsive: [
                {
                    breakpoint: 768,
                    settings: {            
                    arrows: true,
                    slidesToShow: 3
                    }
                }
                ]
            },
        }
    },
    created () {
        this.all();
       // this.allproducts();
    },
    methods: {
        showNext() {
        this.$refs.carousel.next()
      },
        all(){
                if(this.idprod){
                    axios.get('/fetchLivre/'+this.idprod).then(resp =>{
                        this.livre = resp.data;
                        //this.iproduct = resp.data.images;
                        console.log(this.livre);
                        return this.livre;
                       
                            
                    })
                }
        },

        allproducts(){
            
                axios.get('/all_product/').then(resp =>{
                    this.fproducts = resp.data;
                   // console.log(this.products);
                    return this.fproducts;
                        
                })
            
        },

        addToCart(livre){
            this.$store.commit('addToCart', livre);
        }
    },
    props:{
        idprod:{

        }
    },

    mounted(){
        console.log(this.idprod);
    }

    
}
</script>

<style scoped >
    .product-single-details{
        padding-left: 50px  !important;
    }
    .image_carroussel{
        padding-left: 75px;
        padding-right: 75px;
    }
    .carte{
        padding : 15px !important;
        
    }
    .image_card{
        height: 250px !important;
        width: 100% !important;
    }
    .carroussel_img{
        padding-left: 4px;
        padding-right: 4px;
    }

    .slick-prev:before, .slick-next:before{
        color : black !important;
    }

    .btn_cart{
        cursor: pointer;
        color: white  !important;
    }
</style>