<template>
    <div class="col-sm">
        <a @click="openModal" class="btn btn-primary text-white"><i class="icon ion-ios-add"></i> Ajouter une collection</a>
        <br> <br>
        <div class="table-wrap">
            
            <table class="table table-hover  w-100 display pb-30">
                <thead>
                <tr>
                    <th>Intitulé</th>
                    <th>Vedette</th>
                    <th>Publiée</th>

                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="role in roles" :key="role.id">
                    <td>{{role.titre}}</td>
                    <td >
                        <i v-if="role.popular==true" class="fa fa-check" style="color:green"></i>
                        <i v-else class="fa fa-times" style="color:red"></i>
                    </td>
                    <td>
                        <i v-if="role.publish==true" class="fa fa-check" style="color:green"></i>
                        <i v-else class="fa fa-times" style="color:red"></i>
                    </td>
                    <td>
                        <a class="btn btn-warning" @click="edit_role(role)">
                            <i class="fa fa-edit blue" style="color:white"></i>
                        </a>
                        
                        <a class="btn btn-danger" @click="delete_role(role.id)">
                            <i class="fa fa-trash red" style="color:white"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <!-- The Modal -->
        <div class="modal" id="modalAddRole"  tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">{{ editMode ? 'Modification ': 'Nouvelle '}} Catégorie</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        
                            
                        

                        <div class="form-group">
                            <label>Intitule </label>
                            <input v-model="form.intitule" type="text" name="intitule" required
                                   class="form-control" :class="{ 'is-invalid': form.errors.has('intitule') }">
                            
                        </div>

                        <div class="form-group">
                            <label>Description </label>
                            <textarea v-model="form.description" class="form-control"></textarea>
                        </div>

                        <div class="row" style="margin-left:10px">
                            <div class="form-check col-md-6">
                                <input type="checkbox" class="form-check-input" 
                                 v-model="form.most_popular" value="1">
                                <label class="form-check-label" for="exampleCheck1">Vedette</label>
                            </div>

                            <div class="form-check col-md-6">
                                <input type="checkbox" class="form-check-input" 
                                 v-model="form.publish" value="1">
                                <label class="form-check-label" for="exampleCheck1">Publier</label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Categorie </label>
                            <select v-model="form.categorie_id" class="form-control">
                                <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{cat.cat}}</option>
                            </select>
                        </div>





                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ANNULER</button>
                        <button class="btn btn-primary" @click="editMode? update_role(idRoleEdit) : add_role()">{{ editMode ? 'MODIFIER ': 'VALIDER '}}</button>

                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
        data () {
            return {
                editMode:false,
                idRoleEdit:"",
                // Create a new form instance
                form: new Form({
                    intitule: '',
                    
                    description:'',
                    most_popular:false,
                    publish:false,
                    categorie_id:''

                }),
                roles :{},
                categories:null,
            }
        },

        created(){
            this.all_role();
            this.all_categorie();

            Fire.$on('ApresCreation',()=>{
                this.all_role();
            });
            //setInterval(()=> this.all_role(),3000)
        },

        methods: {

            openModal(){
                this.editMode = false;
                this.form.reset();
                $('#modalAddRole').modal('show');
            },

           

            update_role(id){
                Swal.fire({
                    title: "Checking...",
                    text: "Veuillez patienter!",
                    imageUrl: "/assets/img/6.gif",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });

                //console.log(id)
                this.form.photo = this.doc_pdf1;

                axios.put('/update_collection/'+id,{
                    intitule :this.form.intitule, 
                    description :this.form.description, 
                    statut : this.form.publish, 
                    popular : this.form.most_popular,
                     
                    categorie : this.form.categorie_id,

                }).then((data)=>{
                    Fire.$emit('ApresCreation');
                    $('#modalAddRole').modal('hide');
                    $('.modal-backdrop').remove();
                    /* Vue.swal({
                         type: 'success',
                         title: 'Enregistré',
                         text: 'Le role a été ajouté avec succès',
                     });
                     toast.fire({
                        type: 'success',
                        title: 'Modification categorie avec succès'
                    })
                     */



                    Swal.fire(
                        'Modification!',
                        'categorie modifiée avec succès',
                        'success'
                    )
                    /*.then(()=>{
                        window.location.href = '/admin/category'
                    })*/

                }).catch(()=>{

                })
            },

            edit_role(role){
                console.log(role.cat);
                this.editMode = true;
                this.form.reset();
                $('#modalAddRole').modal('show');
                this.form.intitule=role.titre;
                this.form.description = role.description;
                this.form.publish = role.publish;
                this.form.most_popular = role.popular;
                this.form.categorie = role.categorie_id;
                this.idRoleEdit = role.id;
            },

            add_role () {
                Swal.fire({
                    title: "Checking...",
                    text: "Veuillez patienter!",
                    imageUrl: "/assets/img/6.gif",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });

                // Submit the form via a POST request*

                 this.form.photo = this.doc_pdf1;
                axios.post('/add_collection',
                    {
                        intitule :this.form.intitule, 
                        description :this.form.description, 
                        statut : this.form.publish, 
                        popular : this.form.most_popular,
                     
                        categorie : this.form.categorie_id,
                     }
                )
                    .then(({ data }) => {
                        this.form.intitule="";
                        Fire.$emit('ApresCreation');
                        $('#modalAddRole').modal('hide');
                        $('.modal-backdrop').remove();
                        /* Vue.swal({
                             type: 'success',
                             title: 'Enregistré',
                             text: 'Le role a été ajouté avec succès',
                         });*/

                        Swal.fire(
                            'Insertion!',
                            'categorie ajoutée success',
                            'success'
                        )/*.then(()=>{
                            window.location.href = '/admin/category'
                        })
                        toast.fire({
                            type: 'success',
                            title: 'Ajout categorie avec succès'
                        })*/

                    })

            },

            all_role(){
                axios.get('/all_collection').then(resp =>{
                    //console.log(resp);

                    this.roles = resp.data
                }).catch(function(error){
                    console.log(error)
                })
            },

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
                        axios.get('/destroy_collection/'+id).then(resp =>{

                            Fire.$emit('ApresCreation');
                            Swal.fire(
                                'Supprimé!',
                                'Cette categorie a été supprimée avec succès.',
                                'success'
                            )


                        }).catch(function(error){
                            console.log(error)
                        })
                    }


                })

            },

            all_categorie(){
                axios.get('/all_categorie').then(resp =>{
                    //console.log(resp);

                    this.categories = resp.data
                }).catch(function(error){
                    console.log(error)
                })
            },

        }
    }
</script>

<style scoped>

</style>