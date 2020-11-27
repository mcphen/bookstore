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
                        

                        <hr class="short-divider">

                        <div class="price-box">
                            
                            <span class="product-price">${{livre.price}}</span>
                        </div><!-- End .price-box -->
                        <div class="product-desc" v-html="livre.description">
                            
                        </div><!-- End .product-desc -->
                        

                        
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

<style>
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
</style>