<template>
    <div class="content-wrapper">
        <!-- Breadcrumbs -->
        <BreadcrumbsComponent></BreadcrumbsComponent>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add single product in group</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">

                        <div class="form-group">
                            <label for="gallery">Product gallery</label>
                            <div ref="dropzone" class="dropzone p-3 text-white" id="gallery">
                                <div class="dz-message">
                                    <h5 class="text-center">Add images</h5>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="colors">Color</label>
                            <multiselect v-model="colors.value" id="colors" mode="tags"
                                         :close-on-select="false"
                                         :searchable="true"
                                         :create-option="true" :options="colors"></multiselect>
                        </div>

                        <ListBoxComponent ref="sizes" v-bind:sizes="sizes"></ListBoxComponent>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <div class="input-group">
                                <input id="price" class="form-control" type="number" placeholder="price...">
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button @click.prevent="store" type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
import BreadcrumbsComponent from "../../components/BreadcrumbsComponent.vue";
import Multiselect from '@vueform/multiselect';
import Dropzone from 'dropzone';
import axios from "axios";
import ListBoxComponent from "./components/ListBoxComponent.vue";
export default {
    name: "AddSingleProductView",

    mounted() {
        this.dropzone = new Dropzone(this.$refs.dropzone, {
            url:'/api/admin/products/single',
            maxFiles: 6,
            autoProcessQueue: false,
            addRemoveLinks: true,
        })

        //this.getColors();
        //this.getSizes()
    },

    updated() {

    },

    data(){
        return{

            dropzone: null,

            colors:[
                {value: 1, label: 'Red'},
                {value: 2, label: 'Green'},
                {value: 3, label: 'White'},
                {value: 4, label: 'Black'}
            ],

            sizes:[
                {value: 1, label: 'S'},
                {value: 2, label: 'M'},
                {value: 3, label: 'L'},
                {value: 4, label: 'XL'}
            ],

        }
    },

    methods:{
        getSizes(){
            axios.get('/api/sizes')
                .then(res => {
                    this.sizes = res.data.data;
                    console.log(res);
                })
                .catch(error => {
                    console.log(error);
                })
        },

        getColors(){
            axios.get('/api/colors')
                .then(res => {
                    this.sizes = res.data.data;
                    console.log(res);
                })
                .catch(error => {
                    console.log(error);
                })
        },

        store(){
            const data = new FormData();
            let sizes = this.$refs.sizes.addedSizes;
            let color = 1;
            let price = 100;
            let product_id = 1;

            data.append('color_id', color);
            data.append('product_id', product_id);
            data.append('price', price);

            let gallery = this.dropzone.getAcceptedFiles();

            sizes.forEach(size => {
                data.append('sizes[]', size.value)
            })

            gallery.forEach(image => {
               data.append('gallery[]', image);
            });

            console.log(data);
            axios.post('/api/admin/products/single', data)
            .then(res => {
                console.log(res);
                this.dropzone.removeAllFiles();
            })
            .catch(error => {
                console.log(error);
            })
        },

    },

    components: {ListBoxComponent, BreadcrumbsComponent,Multiselect}
}

</script>

<style src="@vueform/multiselect/themes/default.css"></style>
<style scoped>

.dropzone {
    background: grey;
    border-radius: 5px;
    border: 4px dashed #FAFAFA93;
    border-image: none;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

.listbox{
    /*width: 350px;*/
    /*height: 100px;*/
    /*max-width: 500px;*/
    /*min-width: 100px;*/
}
</style>
