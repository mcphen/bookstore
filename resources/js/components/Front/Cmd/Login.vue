<template>
    <div class="col-md-6">
            <div class="heading">
                <h2 class="title">Connexion</h2>
                <p>Vous avez déjà effectué une commande sur notre site (votre compte client existe) 
                    ou vous avez un compte auteur. Inscrivez votre email et votre mot de passe puis cliquez sur [se connecter]</p>
            </div><!-- End .heading -->

            
                <input type="email" class="form-control" placeholder="Email Address" v-model="form.email">
                <input type="password" class="form-control" placeholder="Password" v-model="form.password">

                <div class="form-footer">
                    <button type="submit" @click="btn_login" class="btn btn-primary">Connexion</button>
                    <a href="#" class="forget-pass"> Forgot your password?</a>
                </div><!-- End .form-footer -->
            
    </div><!-- End .col-md-6 -->
</template>

<script>
export default {
    data(){
        return{
            form: new Form({
                    email: '',
                    password:''


            }),
        }
    },

    methods:{


        
         
        btn_login(){
            let email = this.form.email;
            let password = this.form.password;

            if(email!='' && password!=''){
                this.form.post('/auth')
                    .then(({ data }) => { 
                        //console.log(data)
                        let user_c = data;
                        if(this.$store.state.cart.length>0){
                            let data = {
                                cart: JSON.stringify(this.$store.state.cart),
                                iduser: user_c.id
                            }
                            axios.post('/addToPanier',data)
                        }
                        window.location.href = '/'
                      
                        
                    })
            }

        }
    },
}
</script>

<style>

</style>