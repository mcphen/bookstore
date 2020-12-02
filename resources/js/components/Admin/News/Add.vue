<template>
    <div>
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="titre">Titre <span class="attention">*</span></label>
                <input class="form-control" id="titre" v-model="form.titre" type="text">
            </div>

            

            

            
 
            
        </div> 
        <div class="form-group">
                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Upload</span>
                                                            </div>
                                                            <div class="form-control text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename" v-if="attachments" v-html="attachments.name"></span></div>
                                                            <span class="input-group-append">
                                                                    <span class=" btn btn-primary btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
                                                            <input type="file" name="chemin_document" accept="images/*" ref="file" @change="addFile">
                                                            </span>
                                                            <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                            </span>
                                                        </div>
                                                    </div>
        <div class="mb-5">
            <label>Description <span class="attention">*</span></label>
            <vue-editor v-model="form.description" />
        </div>
        

        <div class="row" style="margin-left:10px">
            
                            

                            <div class="form-check col-md-3" style="    padding-top: 40px;">
                                <input type="checkbox" class="form-check-input" 
                                 v-model="form.publish" value="1">
                                <label class="form-check-label" for="exampleCheck1">Publier</label>
                            </div>

        </div>
        <button v-if="edit" class="btn btn-primary" @click="UpdateProduct">Modifier</button>

        <button v-else class="btn btn-primary mt-1" @click="addProduct">Enregistrer</button>
    </div>
</template>


<script>
    import { VueEditor } from "vue2-editor";



    export default {
        components: { VueEditor },

        props:{
            edit:{

            }
        },

        mounted(){
            //this.edit;
            console.log('edit '+this.edit);
        },

        data () {
            return {

                // Create a new form instance
                form: new Form({
                    titre: null,
                    description:null,
                    
                    publish:false,
                    chemin_document:'',


                }),
                
                attachments:null,
                doc_pdf:null,
                attachments1:null,
                doc_pdf1:null,
                options:[],
                couleurs:[],
                genres:{},
                dialogImageUrl: "",
                dialogVisible: false,
                imageList: [],
                status_msg: "",
                
                isCreatingPost: false,
                
                componentKey: 0,
                fileList: []
                

            }
        },

        created() {
           
            
           
            this.editProduct();
        },

        methods:{

            addProduct(){
                
                if(this.form.titre!=null && this.form.description!=null ){
                    Swal.fire({
                    title: "Checking...",
                    text: "Veuillez patienter!",
                    imageUrl: "/assets/img/6.gif",
                    showConfirmButton: false,
                    allowOutsideClick: false
                    });
                    let formData = new FormData();
                    formData.append("titre", this.form.titre);
                    formData.append("description", this.form.description);
                    
                    formData.append("publish", this.form.publish);
                    formData.append(`images`, this.doc_pdf);
                    
                    console.log(this.doc_pdf);
                    
                   
                    axios.post('/add_news',formData, {
                        headers: { "Content-Type": "multipart/form-data" }
                    }).then(({data})=>{
                        Swal.fire(
                            'Succes!',
                            "Produit ajouté avec succès",
                            'success'

                            
                        ).then(()=>{
                            window.location.href = '/admin/news'
                        });
                    })
                }else{
                    Swal.fire(
                        'Erreur!',
                        'Veuillez renseigner les champs obligatoires',
                        'error'
                    )
                }
                
            },
           
            

            editProduct(){
                if(this.edit){
                    axios.get('/fetchLivre/'+this.edit).then(resp =>{
                        //console.log(resp.data);
                        this.form.titre = resp.data.produit.titre;
                        this.form.description = resp.data.produit.description;
                        this.form.price = resp.data.produit.price;
                        //this.form.genre = resp.data.produit.genre_id;
                  
                        this.form.publish= resp.data.produit.publish;
                        this.form.popular= resp.data.produit.popular_livre;
                        this.form.statut_stock = resp.data.produit.statut;
                      /*  this.form.categories = resp.data.categories;
                        this.form.couleurs = resp.data.couleurs;
                        this.imageList = resp.data.images;*/
                    })
                }
            },

           
           

            addFile(e){
                //console.log(e);
                var file =  e.target.files[0];
                this.attachments = file;
                var reader = new FileReader;

                reader.onload = (e) =>{
                   // console.log(e.target.result);
                    this.doc_pdf = e.target.result;
                };

                reader.readAsDataURL(file);
                
                //console.log(this.attachments);
            },


 

        }
    };
</script>


<style scoped>
.hideUpload > div {
  display: none;
}
.avatar-uploader .el-upload {
  border: 1px dashed #d9d9d9;
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.avatar-uploader .el-upload:hover {
  border-color: #409eff;
}
.avatar-uploader-icon {
  font-size: 28px;
  color: #8c939d;
  width: 178px;
  height: 178px;
  line-height: 178px;
  text-align: center;
}
.avatar {
  width: 178px;
  height: 178px;
  display: block;
}
</style>
