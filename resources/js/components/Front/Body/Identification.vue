<template>
  <div class="container">
    <div class="row">
        <login></login>
        <register></register>
        
    </div><!-- End .row -->
</div>
</template>

<script>
import login from '../Cmd/Login'

import register from '../Cmd/Register'

export default {
    components:{
        login, register
        
    }
}
        
</script>

<style>

</style>