import{_ as c,b as r,e as i,o as n,c as o,f as _,d as t,F as u,r as h,t as a}from"./app.84c357ef.js";import{B as m}from"./BreadcrumbsComponent.9ca5c3f7.js";const p={name:"IndexView",components:{BreadcrumbsComponent:m},data(){return{sizes:[]}},mounted(){this.getSizes()},methods:{getSizes(){r.get("/api/admin/sizes").then(e=>{this.sizes=e.data.data}).catch(e=>{console.log(e)})}}},b={class:"content-wrapper"},f={class:"content"},g={class:"container-fluid"},v={class:"col-12"},x={class:"card mt-2"},z=t("div",{class:"card-header"},[t("h3",{class:"card-title"},"Size"),t("a",{href:"",class:"btn btn-secondary fa-pull-right"},"Create size")],-1),B={class:"card-body"},y={id:"example2",class:"table table-bordered table-hover"},C=t("thead",null,[t("tr",null,[t("th",null,"ID"),t("th",null,"Size"),t("th",null,"Created"),t("th",null,"Updated"),t("th",null,"Action"),t("th",null,"Delete")])],-1),S=t("td",null,[t("a",{class:"btn btn-primary m-1",href:""},[t("i",{class:"fas fa-edit"}," Edit")])],-1),D=t("td",null,[t("button",{type:"submit",class:"btn btn-danger m-1"},[t("i",{class:"fas fa-trash-alt"}," Delete")])],-1);function V(e,w,I,$,l,k){const d=i("BreadcrumbsComponent");return n(),o("div",b,[_(d),t("section",f,[t("div",g,[t("div",v,[t("div",x,[z,t("div",B,[t("table",y,[C,t("tbody",null,[(n(!0),o(u,null,h(l.sizes,s=>(n(),o("tr",null,[t("td",null,a(s.id),1),t("td",null,a(s.size),1),t("td",null,a(s.created_at),1),t("td",null,a(s.updated_at),1),S,D]))),256))])])])])])])])])}const N=c(p,[["render",V]]);export{N as default};
