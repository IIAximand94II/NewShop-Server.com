import{_ as o,e as c,o as a,c as r,d as e,f as n,w as d,g as i}from"./app.84c357ef.js";const l={name:"BreadcrumbsComponent",data(){return{}},mounted(){this.createBreadcrumbs()},methods:{createBreadcrumbs(){console.log(this.$route);let t=this.$route.path;t=t.split("/").filter(Boolean),console.log(t)}}},_={class:"content-header"},m={class:"container-fluid"},u={class:"row mb-2"},h=e("div",{class:"col-sm-6"},[e("h1",null,"BreadCrumbs")],-1),p={class:"col-sm-6"},b={class:"breadcrumb float-sm-right"},f={class:"breadcrumb-item"},B=i("Home"),v=e("li",{class:"breadcrumb-item"},[e("a",{href:"#"},"Products")],-1),x=e("li",{class:"breadcrumb-item active"},"Create product",-1);function C(t,$,g,k,w,N){const s=c("router-link");return a(),r("section",_,[e("div",m,[e("div",u,[h,e("div",p,[e("ol",b,[e("li",f,[n(s,{to:{name:"main.index"}},{default:d(()=>[B]),_:1},8,["to"])]),v,x])])])])])}const E=o(l,[["render",C]]);export{E as B};