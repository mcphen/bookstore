<template>
<div :class="'banniere_class'">
    <div class="container">
                    <div class="row">
                        <div class="col-lg-4" style="padding-right:20px">
                            <form action="#" method="get" class="find-form">
                                <h3>Trouver un livre</h3>
                                <div class="input-custom">
                                    <b-input-group  class="mb-2">
                                        <b-form-input type="search" placeholder="Recherche par titre..." v-model="titre"></b-form-input>
                                        <b-input-group-append is-text>
                                        <b-icon icon="search" @click="search_titre"></b-icon>
                                        </b-input-group-append>
                                    </b-input-group>
                                </div>

                                <div class="input-custom">
                                    <b-input-group  class="mb-2">
                                        <b-form-input type="search" placeholder="Recherche par auteur..." v-model="auteur"></b-form-input>
                                        <b-input-group-append is-text>
                                        <b-icon icon="search" @click="search_auteur"></b-icon>
                                        </b-input-group-append>
                                    </b-input-group>
                                </div>
                                
                            </form>
                            <div class="home-banner mb-2" style="background-image: url('assets/images/banners/watch.png');">
                                <div class="row row-sm">
                                    <div class="col-6" style="display : flex;justify-content: flex-end;">
                                        <div class="banner-content">
                                            <a href="#">Les auteurs</a>
                                            
                                            
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

					<div class="col-lg-8 mb-2" v-if="news.length>0">
                        <VueSlickCarousel v-bind="settings">
                            <div class="home-slide" v-for="n in news" :key="n.id">
                                <a href="#">
                                <div class="slide-content" :style="{ backgroundImage: `url(${n.img_news})`, backgroundPosition : 'center', backgroundSize:'cover' }">
                                    <div class="titre_ban" >
                                        
                                        <span class="titre_span">{{n.titre}}</span>
                                        
                                    </div>
                                    
                                </div>
                                </a>
                            </div>
                            
                        </VueSlickCarousel>
						
					</div><!-- End .col-lg-9 -->
				</div><!-- End .row -->
  </div>
</div>
  
</template>

<script>
export default {
    data(){
        return{
            titre:'',
            auteur:'',
            settings:{
                accessibility: false,
                dots: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: true,
                autoplay: true,
                
                autoplaySpeed: 5000,
            },
            news: [],
        }
    },

    

    created(){
        this.all_news()
    },

    methods:{
        search_titre(){
            console.log("titre")
        },

        search_auteur(){

        },

        all_news(){
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

<style scoped>
 .find-form {
    border-top: 2px solid #14438c;
    box-shadow: 0 0 2px rgba(0,0,0,0.1);
    border-radius: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0 4.6rem 3rem;
    margin-bottom: 0;
}



.find-form h3 {
  padding: 3.8rem 0 3.5rem;
  text-transform: uppercase;
  font: 500 2.2rem "Oswald",sans-serif;
  letter-spacing: 0px;
}

.find-form .select-custom, .find-form .input-custom {
    width: 100%;
    margin-bottom: 2.5rem;
}
.select-custom, .input-custom {
    position: relative;
    margin-bottom: 1rem;
}


.input-custom .input-group-text{
    cursor: pointer;
}


select.form-control:not([size]):not([multiple]) {
    height: 4.6rem;
}
.find-form select.form-control {
    margin-bottom: 0;
    padding: 0 1.5rem;
    font: 600 1.35rem "Open Sans","Open Sans",sans-serif;
    letter-spacing: 0.01em;
    color: #747474;
    opacity: 0.9;
    border-radius: 3px;
    max-width: none;
}

.home-banner {
  background-color: #15438e;
  background-repeat: no-repeat;
  background-position: 98% 35%;
  height: 170px;
}



.row.row-sm {
  margin-right: -10px;
  margin-left: -10px;
}

.row.row-sm [class*='col-'] {
  padding-right: 20px;
  padding-left: 10px;
}

.home-banner .banner-content {
  display: flex;
  flex-direction: column;
}

.home-banner .banner-content h3 {
  font: 700 3rem/1 "Oswald",sans-serif;
}

.home-banner .banner-content p {
  font: 400 1.7rem "Oswald",sans-serif;
  line-height: 26px;
  margin-bottom: 1rem;
}

.home-banner .banner-content button {
  font: 600 13px "Open Sans","Open Sans",sans-serif;
  color: #151515;
  letter-spacing: 0.005em;
  background: #fff;
  border-radius: 5px;
  padding: 6px;
  width: 82px;
  min-width: auto;
  margin-bottom: 1rem;
}

.slick-prev:before, .slick-next:before{
    color : black !important;
}

.titre_ban{
    padding: 15px;
    background-color: #0606063b;
    text-align: center;
}
.titre_span{
    color : white !important;
}
</style>