<template>
<div :class="'featured_class'">
    <div class="container">
        <section class="product-panel">
            <div class="section-title">
                            <h2>A LA UNE</h2>
            </div>
            <div v-if="livres.length>0">
                <VueSlickCarousel v-bind="settings">
                    <div class="product-default inner-quickview inner-icon center-details" v-for="livre in livres" :key="livre.id">
                        <div :class="'livre_row'">
                                <figure>
                                    <a :href="'livre/'+livre.livre.slug">
                                        <img :src="livre.img.images_livres" :class="'image_livre'">
                                    </a>
                                    
                                    <div class="btn-icon-group">
                                        <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i></button>
                                    </div>
                                   <a :href="'livre/'+livre.livre.slug" class="btn-quickview" title="Quick View">Voir plus</a> 
                                </figure>
                                <div class="product-details">
                                    
                                    <h2 class="product-title">
                                        <a :href="'livre/'+livre.livre.slug">{{livre.livre.titre}}</a>
                                    </h2>
                                    
                                   
                                </div><!-- End .product-details -->
                                </div>
                    </div>
                </VueSlickCarousel>       
            </div>
        </section>

                    
    </div>
</div>
    
</template>

<script>
export default {
    data(){
        return{
             settings:{
                
                dots: false,
                infinite: true,
                
                
                speed: 500,
                slidesToShow: 5,
                slidesToScroll: 5,
                
                centerMode: true,
                centerPadding: "20px",
                //variableWidth: true,
                responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        initialSlide: 2
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    }
                ]
            }, 
            livres :[]
        }
    },

    created(){
        this.all_livre();
    },

    methods:{
        all_livre(){
            axios.get('/list_livre').then(resp =>{
                //console.log(resp.data)
                let i = 0
               resp.data.forEach((menu)=>{
                    if(i<=8){
                        if(menu.livre.publish==1 && menu.livre.popular_livre==1){
                            this.livres.push(menu)
                           // console.log(menu)
                        }
                    }
                        
                    i++;
                })
                    

                    
                    
            }).catch(function(error){
                    console.log(error)
            })
        }
    }
}
</script>

<style scoped>
.featured_class{
    background-color: #fbfbfb;
    padding: 15px;
}
.livre_row{
    width:200px!important;
}
.image_livre{
    
    height: 300px;
    margin: auto;
}

.slick-prev:before, .slick-next:before{
    color : black !important;
}
</style>

