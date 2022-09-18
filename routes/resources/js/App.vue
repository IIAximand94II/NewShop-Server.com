<template>
    <!-- Header -->
    <HeaderComponent></HeaderComponent>

    <!-- Sidebar -->
    <SidebarComponent></SidebarComponent>

    <!-- View -->
    <router-view></router-view>

    <!-- Footer -->
    <FooterComponent></FooterComponent>
</template>

<script>
import HeaderComponent from "./components/HeaderComponent.vue";
import FooterComponent from "./components/FooterComponent.vue";
import SidebarComponent from "./components/SidebarComponent.vue";
export default {
    name: "App",

    // mounted() {
    //     $(document).trigger('change')
    // },
    //
    // updated() {
    //     $(document).trigger('load')
    // },

    components: {SidebarComponent, FooterComponent, HeaderComponent},
}
</script>

<style scoped>

</style>
