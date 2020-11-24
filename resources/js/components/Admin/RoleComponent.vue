<template>
    
    <div class="col-sm">
        <a @click="openModal" class="btn btn-primary text-white"><i class="icon ion-ios-add"></i> Ajouter un role</a>
									<br> <br>
                                    <div class="table-wrap">
                                        <table class="table  w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>Role</th>
                                                    
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="role in roles" :key="role.id">
                                                    <td>{{role.role}}</td>
                                                    
                                                    <td>
                                                        <a  @click="edit_role(role)">
                                                            <i class="fa fa-edit blue"></i>
                                                        </a>
                                                        /
                                                        <a  @click="delete_role(role.id)">
                                                            <i class="fa fa-trash red"></i>
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
                                                <h4 class="modal-title">{{ editMode ? 'Modification ': 'Nouveau '}} Role</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                                <div class="modal-body">
                                                    
                                                        <div class="form-group">
                                                        <label>Libelle role</label>
                                                        <input v-model="form.role" type="text" name="role" required
                                                            class="form-control" :class="{ 'is-invalid': form.errors.has('role') }">
                                                        
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
        name:'RoleComponent',
        data () {
            return {
                editMode:false,
                idRoleEdit:"",
            // Create a new form instance
            form: new Form({
                role: '',
                
            }),
            roles :{},
            }
        },
        mounted() {
            console.log('Component mounted.')
        },

        created(){
            this.all_role();

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
                //console.log(id)
               
                this.form.put('/update_role/'+id).then((data)=>{
                    Fire.$emit('ApresCreation');
                    $('#modalAddRole').modal('hide');
                    $('.modal-backdrop').remove();
                       /* Vue.swal({
                            type: 'success',
                            title: 'Enregistré',
                            text: 'Le role a été ajouté avec succès',
                        });*/

                    toast.fire({
                        type: 'success',
                        title: 'Modification role avec succès'
                    })

                }).catch(()=>{
                    
                })
            },

            edit_role(role){
                console.log(role.libelle_role);
                this.editMode = true;
                this.form.reset();
                $('#modalAddRole').modal('show');
                this.form.role=role.role;
                this.idRoleEdit = role.id;
            },

            add_role () {
                // Submit the form via a POST request
                
               
                this.form.post('/add_role')
                    .then(({ data }) => { 
                        this.form.role="";
                        Fire.$emit('ApresCreation');
                        $('#modalAddRole').modal('hide');
                        $('.modal-backdrop').remove();
                        Swal.fire(
                            'Supprimé!',
                            'Ce role a été supprimé avec succès.',
                            'success'
                            )

                      
                        
                    })
                
            }, 

            all_role(){
                axios.get('/all_role').then(resp =>{
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
                       axios.get('/destroy_role/'+id).then(resp =>{
                        
                            Fire.$emit('ApresCreation');
                            Swal.fire(
                            'Supprimé!',
                            'Ce role a été supprimé avec succès.',
                            'success'
                            )
                        

                        }).catch(function(error){
                            console.log(error)
                        }) 
                    }
                    
                    
                })

            }
        }
    }
</script>
