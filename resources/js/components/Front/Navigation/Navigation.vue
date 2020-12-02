<template>

    <ul v-if="mobile==0" :class="'menu'">
        <li><a :href="'/'">Accueil</a>   </li>
         <li v-for="m in menus" :key="m.id">
            <a href="#">{{ m.cat }}</a>
        </li>
    </ul>
    <ul v-else :class="'mobile-menu'">
        <li><a :href="'/'">Accueil</a>   </li>
        <li v-for="m in menus" :key="m.id">
            <a href="#">{{ m.cat }}</a>
        </li>
        <li><a :href="'/login'" class="login-link">Connexion</a></li>
    </ul>
</template>

<script>
export default {

    props:['mobile'],

    data(){
        return{
            menus:[]
        }
    },

    created(){
        this.all_cat();
    },

    methods:{
        all_cat(){
            axios.get('/all_categorie').then(resp =>{
                    //console.log(resp);
                    resp.data.forEach((menu)=>{
                        
                        if(menu.publish==1){
                            this.menus.push(menu)
                            //console.log(menu)
                        }
                    })
                    //this.menus = resp.data
            }).catch(function(error){
                    console.log(error)
            })
        }
    }
}
</script>

<style>



</style>