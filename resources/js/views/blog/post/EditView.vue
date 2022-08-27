<template>
    <div class="content-wrapper">
        <!-- Breadcrumbs -->
        <BreadcrumbsComponent></BreadcrumbsComponent>

        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create post</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">

                        <div class="form-group  mb-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="title">Post title</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" v-model="title" id="title" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Category</label>
                                </div>
                                <div class="col-md-10">
                                    <multiselect v-model="selectedCategory" valueProp="id" :object="true" label="title" :options="categories"></multiselect>
                                </div>
                            </div>


                        </div>

                        <div class="form-group mb-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Title image</label>
                                </div>
                                <div class="col-md-10">
                                    <div ref="dropzone" class="dropzone p-3 text-white" id="title_image">
                                        <div class="dz-message">
                                            <h5 class="text-center">Add images</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Content</label>
                                </div>
                                <div class="col-md-10">
                                    <VueEditor v-model="content" useCustomImageHandler @image-added="imageHandler"></VueEditor>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Tags</label>
                                </div>
                                <div class="col-md-10">
                                    <multiselect v-model="selectedTag" id="tags" mode="tags"
                                                 :close-on-select="false"
                                                 :searchable="true"
                                                 label="title"
                                                 valueProp = "id"
                                                 :create-option="true"
                                                 :object="true"
                                                 :options="tags"></multiselect>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="checkbox" v-model="status"> Published
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button @click.prevent="update(this.post.id)" type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>
</template>

<script>
import Multiselect from "@vueform/multiselect";
import Dropzone from 'dropzone';
import axios from "axios";
import { VueEditor } from 'vue3-editor'
import BreadcrumbsComponent from "../../../components/BreadcrumbsComponent.vue";
export default {
    name: "EditView",
    components: {BreadcrumbsComponent,Multiselect,VueEditor},
    mounted(){

        this.dropzone = new Dropzone(this.$refs.dropzone, {
            url:'/fsdfsdf',
            maxFiles: 1,
            autoProcessQueue: false,
            addRemoveLinks: true,
        })


        this.getCategories();
        this.getTags();
        this.getPost()
    },


    data(){
        return{
            post:[],

            categories:[],
            tags:[],


            title:'',
            content:'',
            status:false,

            selectedCategory:null,
            selectedTag: []
        }
    },

    methods:{
        getPost(){
            axios.get(`/api/admin/blog/posts/${this.$route.params.id}`)
                .then(res =>{
                    this.post = res.data.data;
                    this.title = res.data.data.title;
                    this.content = res.data.data.content;

                    this.selectedTag = this.post.tags
                    this.selectedCategory = this.post.category

                    //this.categories.push({value: this.post.category.id})

                    let image = { name: "Filename", size: 12345 };
                    this.dropzone.displayExistingFile(image, this.post.image);

                    console.log(this.post);
                })
                .catch(error => {
                    console.log(error);
                })
        },

        getCategories(){
            axios.get('/api/admin/blog/categories')
                .then(res => {
                    this.categories = res.data.data;
                    //console.log(res)
                })
                .catch(error => {
                    console.log(error)
                })
        },

        getTags(){
            axios.get('/api/admin/blog/tags')
                .then(res => {
                    this.tags = res.data.data;
                    //console.log(res)
                })
                .catch(error => {
                    console.log(error)
                })
        },

        imageHandler(file, Editor, cursorLocation, resetUploader) {
            console.log(file);
            let data = new FormData();
            data.append("image", file);

            axios.post("/api/admin/images", data)
                .then(res => {
                    //console.log(res);
                    const url = res.data.url; // image url
                    Editor.insertEmbed(cursorLocation, "image", url);
                    resetUploader();
                })
                .catch(error => {
                    console.log(error);
                });
        },

        update(id){
            console.log('updated!');
            let data = new FormData();
            let image = this.dropzone.getActiveFiles()

            image.forEach(image => {
                data.append('image', image);
            });

            this.selectedTag.forEach(elem => {
               data.append('tags[]', elem.id)
            });

            data.append('title', this.title);
            data.append('content', this.content);
            data.append('status', this.status);
            data.append('category_id', this.selectedCategory.id)
            data.append('_method', 'PATCH');

            //console.log(data.tags);

            axios.post(`/api/admin/blog/posts/${id}`, data)
                .then(res => {
                    console.log(res);

                    this.$wkToast(res.data.message, {
                        horizontalPosition: 'right',
                        verticalPosition: 'top',
                        transition: 'fade',
                    })
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
<style scoped>
.dz-success-mark,
.dz-error-mark{
    display: none;
}
.dropzone {
    background: grey;
    border-radius: 5px;
    border: 4px dashed #FAFAFA93;
    border-image: none;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

</style>
