<template>
    <div class="content-wrapper">
        <!-- Breadcrumbs -->
        <BreadcrumbsComponent></BreadcrumbsComponent>

        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-warning"> 404</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                    <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may <router-link :to="{ name:'main.index' }">return to dashboard</router-link>.
                    </p>

                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
    </div>
</template>

<script>
import BreadcrumbsComponent from "../../components/BreadcrumbsComponent.vue";
export default {
    name: "404View",
    components: {BreadcrumbsComponent}
}
</script>

<style scoped>

</style>
