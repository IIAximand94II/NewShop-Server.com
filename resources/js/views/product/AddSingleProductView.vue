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

                        <div class="form-group">
                            <label for="sizes">Sizes</label>
                            <multiselect v-model="sizes.value" id="sizes" mode="tags"
                                         :close-on-select="false"
                                         :searchable="true"
                                         :create-option="true" :options="sizes"></multiselect>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <div class="input-group">
                                <input id="price" class="form-control" type="number" placeholder="price...">
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
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
export default {
    name: "AddSingleProductView",

    mounted() {
        this.dropzone = new Dropzone(this.$refs.dropzone, {
            url:'/test',
            maxFiles: 6,
            autoProcessQueue: false,
        })
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

    components: {BreadcrumbsComponent,Multiselect}
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

</style>
