<template>
  <div>
       <div class="container">
        <section class="product-panel">
                        <div class="section-title">
                            <h2>ACTUALITES</h2>
                        </div>
                        <div v-if="news.length>0">
                            <VueSlickCarousel v-bind="settings">
                            <div class="product-default inner-quickview inner-icon center-details" v-for="n in news" :key="n.id">
                                <figure>
                                    <a href="product.html">
                                        <img :src="n.img_news">
                                    </a>
                                     <a :href="'#'" class="btn-quickview" title="Quick View">Voir plus</a> 
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            {{ n.created_at | moment("MM-DD-YYYY") }}
                                        </div>
                                    </div>
                                    <h2 class="product-title">
                                        <a href="product.html">{{ n.titre }}</a>
                                    </h2>
                                    
                                    <div class="price-box">
                                        <span v-html="$options.filters.subStr(n.description)"></span>
                                      
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
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
            news :[]
        }
    },

    filters:{
        subStr: function (string){
            return string.substring(0,150) + '...';
        }
    },

    created(){
        this.all_livre();
    },

    methods:{
        all_livre(){
             axios.get('/all_news').then(resp =>{
                //console.log(resp.data)
                let i = 0
               resp.data.forEach((menu)=>{
                    if(i<=8){
                        if(menu.status==1 ){
                            this.news.push(menu)
                           //console.log(menu)
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

<style>

</style>