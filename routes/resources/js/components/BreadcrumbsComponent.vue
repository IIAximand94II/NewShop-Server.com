<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>BreadCrumbs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link :to="{ name:'main.index' }">Home</router-link></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active">Create product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "BreadcrumbsComponent",

    data(){
        return{

        }
    },

    mounted() {
        this.createBreadcrumbs()
    },

    methods:{
        createBreadcrumbs(){
            console.log(this.$route);
            let path = this.$route.path;
            path = path.split('/').filter(Boolean);
            console.log(path);
        }
    }
}
</script>

<style scoped>

</style>
