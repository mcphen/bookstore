<template>
    <div class="col-sm">
        <a @click="openModal" class="btn btn-primary text-white"><i class="icon ion-ios-add"></i> Ajouter un utilisateur</a>
        <br> <br>
        <div class="table-wrap">
            
            <table class="table table-hover  w-100 display pb-30">
                <thead>
                <tr>
                    <th>Nom & Prenom</th>
                    <th>Email</th>
                    <th>Role</th>

                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="role in roles" :key="role.id">
                    <td>{{role.name}} {{role.firstname}}</td>
                    <td >
                        {{ role.email }}
                    </td>
                    <td>
                        {{ role.role.role }}
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
                        <h4 class="modal-title">{{ editMode ? 'Modification ': ''}} Utilsateur</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        
                        

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                     <label>Nom </label>
                                    <input v-model="form.name" type="text" name="name" required
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                </div>
                                <div class="col-md-6">
                                     <label>Prenom </label>
                                    <input v-model="form.firstname" type="text" name="firstname" required
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('firstname') }"> 
                                </div>
                            </div>
                           
                            
                        </div>

                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                     <label>Email </label>
                                    <input v-model="form.email" type="text" name="email" required
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                </div>
                                <div class="col-md-6">
                                     <label>Password </label>
                                    <input v-model="form.password" type="password" name="password" required
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('password') }"> 
                                </div>
                            </div>
                           
                            
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                     <label>Tel </label>
                                    <input v-model="form.tel" type="text" name="tel" required
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('tel') }">
                                </div>
                                <div class="col-md-6">
                                     <label>Adresse </label>
                                    <input v-model="form.addresse" type="text" name="addresse" required
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('addresse') }"> 
                                </div>
                            </div>
                           
                            
                        </div>

                        <div class="form-group">
                            <label>Role </label>
                            <select v-model="form.role" class="form-control">
                                <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{cat.role}}</option>
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
                    name: '',
                    firstname:'',
                    email:'',
                    password:'',
                    tel:'',
                    addresse:'',
                    role:''


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

                axios.put('/update_users/'+id,{
                    name :this.form.name, 
                        firstname :this.form.firstname, 
                        email : this.form.email, 
                        password : this.form.password,
                     
                        tel : this.form.tel,
                        adresse : this.form.addresse,
                        role : this.form.role
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
                this.form.name=role.name;
                this.form.firstname = role.firstname;
                this.form.email = role.email;
                this.form.tel = role.tel;
                this.form.addresse = role.adresse;
                this.form.role = role.role.id;
                this.form.password = '';
                this.idRoleEdit = role.id;
            },

            add_role () {
                if(this.form.name!='' && this.form.firstname!='' && this.form.email!='' && this.form.password!=''){
                Swal.fire({
                    title: "Checking...",
                    text: "Veuillez patienter!",
                    imageUrl: "/assets/img/6.gif",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });

                // Submit the form via a POST request*

                 this.form.photo = this.doc_pdf1;

                axios.post('/add_users',
                    {
                        name :this.form.name, 
                        firstname :this.form.firstname, 
                        email : this.form.email, 
                        password : this.form.password,
                     
                        tel : this.form.tel,
                        adresse : this.form.addresse,
                        role : this.form.role
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
                }else{
                    Swal.fire({
                    title: "Ooooops",
                    text: "Veuillez remplir tous les champs!",
                     type: 'error',

                    
                });
                }
            },

            all_role(){
                
                    axios.get('/all_users').then(resp =>{
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
                        axios.get('/destroy_users/'+id).then(resp =>{

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
                axios.get('/all_role').then(resp =>{
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