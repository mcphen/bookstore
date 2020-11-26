<template>
    <div>
        <div class="btn-group">
        <b-dropdown id="dropdown-1" text="Action" class="m-md-2">
                                
                                <b-dropdown-item v-bind:href="'/admin/livres/edit/'+identifiant">

                                        Modifier

                                </b-dropdown-item>
                                <b-dropdown-item v-bind:href="'/admin/livres/collection/'+identifiant">

                                        Liste Categories

                                </b-dropdown-item>
                                <b-dropdown-item v-bind:href="'/admin/livres/images/'+identifiant">

                                        Liste Images

                                </b-dropdown-item>
                                
                                <b-dropdown-item @click="delete_role(identifiant)">

                                        Supprimer

                                </b-dropdown-item>

         </b-dropdown>
        </div>
    </div>
</template>

<script>
export default {
    props:['identifiant'],

    methods:{
         delete_role(id){

                Swal.fire({
                    title: 'Etes vous sure?',
                    text: "Etes vous sure de vouloir le supprimer",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui',
                    cancelButtonText: 'Non'
                }).then((result) => {
                    if(result.value==true){
                        axios.get('/destroy_livre/'+id).then(resp =>{

                            Fire.$emit('ApresCreation');
                            Swal.fire(
                                'Supprimé!',
                                'Cette categorie a été supprimée avec succès.',
                                'success'
                            ).then(()=>{
                                window.location.href = '/produits'
                            })


                        }).catch(function(error){
                            console.log(error)
                        })
                    }


                })

            }
    },
}
</script>