<template>
  <div class="dropdown-cart-header">
                                            
    
    <a class="dropdown-item" @click="logout">Deconnexion</a>
     
                                         
    </div>
</template>

<script>
export default {
    methods:{
        logout(){
           this.$store.commit('deleteCart'); 
           window.localStorage.clear();
           window.location.href = '/testLogout';
        }
    }
}
</script>

<style scoped>
a{
    cursor: pointer;
}
</style>