<template>
    <div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="titre">Titre <span class="attention">*</span></label>
                <input class="form-control" id="titre" v-model="form.titre" type="text">
            </div>

            <div  class="col-md-6 form-group" v-if="!edit">
               
                <label>Auteur(s)</label>
                <v-select 
                label="name" 
                :value="form.couleurs" 
                index="id" :options="couleurs"
                v-model="form.couleurs" multiple ></v-select>
            </div>
            <div class="col-md-6 form-group">
                <label for="titre">Prix <span class="attention">*</span></label>
                <input class="form-control" id="prix" v-model="form.price" type="text">
            </div>
            
            <div  class="col-md-6 form-group" v-if="!edit">
               
                <label>Catégorie <span class="attention">*</span></label>
                <v-select 
                label="titre" 
                :value="form.categories" 
                index="id" :options="options"
                v-model="form.categories" multiple ></v-select>
            </div>

            

            

            
        </div> 
        <div class="mb-5">
            <label>Description <span class="attention">*</span></label>
            <vue-editor v-model="form.description" />
        </div>
        <div v-if="!edit">
            
            <div class>
            <label >Images <span class="attention">*</span></label>
          <el-upload
            action=""
            list-type="picture-card"
            :on-preview="handlePictureCardPreview"
            :on-change="updateImageList"
            :auto-upload="false"
            
          >
            <i class="el-icon-plus"></i>
          </el-upload>
          <el-dialog :visible.sync="dialogVisible">
            <img width="100%" :src="dialogImageUrl" alt />
          </el-dialog>
        </div>
        </div>

        <div class="row" style="margin-left:10px">
            <div class="col-md-6 form-group">
                
                <label>Statut Stock</label>
                <select v-model="form.statut_stock" class="form-control">
                    
                    <option value="1">Disponible</option>
                    <option value="0">Indisponible</option>
                    
                </select>
            </div>
                            <div class="form-check col-md-3" style="    padding-top: 40px;"> 
                                <input type="checkbox" class="form-check-input" 
                                 v-model="form.popular" value="1">
                                <label class="form-check-label" for="exampleCheck1">Vedette</label>
                            </div>

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
                    price:null,
                    genre:null,
                    publish:false,
                    popular:false,
                    categories:null,
                    couleurs : null,
                    statut_stock:null,


                }),
                types:null,
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
           
            this.all_categories();
            this.all_auteurs();
           
            this.editProduct();
        },

        methods:{

            addProduct(){
                
                if(this.form.titre!=null && this.form.price!=null  && 
                this.form.categories!=null && this.form.description!=null && this.form.statut_stock!=null){
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
                    formData.append("price", this.form.price);
                   // formData.append("genre", this.form.genre);
                    formData.append('statut_stock',this.form.statut_stock);
                   // formData.append("categories", this.form.categories);
                    formData.append("couleurs", this.form.couleurs);
                    formData.append("publish", this.form.publish);
                    formData.append("popular", this.form.popular);
                    $.each(this.form.categories, function(key, cat) {
                       // console.log(cat);
                        formData.append(`categories[${key}]`, cat.id);
                    });

                    $.each(this.form.couleurs, function(key, cl) {
                        formData.append(`couleurs[${key}]`, cl.id);
                    });
                    $.each(this.imageList, function(key, image) {
                        formData.append(`images[${key}]`, image);
                    });
                   
                    axios.post('/add_livre',formData, {
                        headers: { "Content-Type": "multipart/form-data" }
                    }).then(({data})=>{
                        Swal.fire(
                            'Succes!',
                            "Produit ajouté avec succès",
                            'success'

                            
                        ).then(()=>{
                            window.location.href = '/admin/livres'
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
            updateImageList(file) {
                //console.log(file);
                this.imageList.push(file.raw);
            },
            handlePictureCardPreview(file) {
                this.dialogImageUrl = file.url;
                this.imageList.push(file);
                this.dialogVisible = true;
            },
           

            all_categories(){
                axios.get('/all_collection').then(resp =>{
                   

                    this.options = resp.data;

                    
                    
                }).catch(function(error){
                    console.log(error)
                })
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

            all_auteurs(){
                axios.get('/all_users').then(resp =>{
                    //console.log(resp);

                    resp.data.forEach((post)=>{
                        if(post.role_id==2){
                            console.log(post)
                            this.couleurs.push(post)
                        }
                    })

                    
                }).catch(function(error){
                    console.log(error)
                })
            },

           

            UpdateProduct(){
                Swal.fire({
                    title: "Checking...",
                    text: "Veuillez patienter!",
                    imageUrl: "/assets/img/6.gif",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
                    
                axios.put('/edit_product/'+this.edit,{
                    titre : this.form.titre,
                    description : this.form.description,
                    price : this.form.price,
                    //genre : this.form.genre,
                    statut_stock : this.form.statut_stock,
                    publish : this.form.publish,
                    popular:this.form.popular,
                }).then(({data})=>{
                        Swal.fire(
                            'Succes!',
                            "Produit modifié avec succès",
                            'success'

                            
                        ).then(()=>{
                            window.location.href = '/produits'
                        });
                    })
            }

 

        }
    };
</script>


<style>
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
