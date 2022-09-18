import{s as h}from"./default.css_vue_type_style_index_0_src_true_lang.40ff076f.js";import{$ as v}from"./dropzone.2615559f.js";import{_ as b,b as n,e as m,o as f,c as V,f as c,d as t,z as g,A as w,B as C,i as x,g as y,x as E,y as T}from"./app.84c357ef.js";import{v as z}from"./vue3-editor.common.6d626dfd.js";import{B as P}from"./BreadcrumbsComponent.9ca5c3f7.js";const B={name:"EditView",components:{BreadcrumbsComponent:P,Multiselect:h,VueEditor:z.exports.VueEditor},mounted(){this.dropzone=new v(this.$refs.dropzone,{url:"/fsdfsdf",maxFiles:1,autoProcessQueue:!1,addRemoveLinks:!0}),this.getCategories(),this.getTags(),this.getPost()},data(){return{post:[],categories:[],tags:[],title:"",content:"",status:!1,selectedCategory:null,selectedTag:[]}},methods:{getPost(){n.get(`/api/admin/blog/posts/${this.$route.params.id}`).then(s=>{this.post=s.data.data,this.title=s.data.data.title,this.content=s.data.data.content,this.selectedTag=this.post.tags,this.selectedCategory=this.post.category;let e={name:"Filename",size:12345};this.dropzone.displayExistingFile(e,this.post.image),console.log(this.post)}).catch(s=>{console.log(s)})},getCategories(){n.get("/api/admin/blog/categories").then(s=>{this.categories=s.data.data}).catch(s=>{console.log(s)})},getTags(){n.get("/api/admin/blog/tags").then(s=>{this.tags=s.data.data}).catch(s=>{console.log(s)})},imageHandler(s,e,r,a){console.log(s);let o=new FormData;o.append("image",s),n.post("/api/admin/images",o).then(l=>{const p=l.data.url;e.insertEmbed(r,"image",p),a()}).catch(l=>{console.log(l)})},update(s){console.log("updated!");let e=new FormData;this.dropzone.getActiveFiles().forEach(a=>{e.append("image",a)}),this.selectedTag.forEach(a=>{e.append("tags[]",a.id)}),e.append("title",this.title),e.append("content",this.content),e.append("status",this.status),e.append("category_id",this.selectedCategory.id),e.append("_method","PATCH"),n.post(`/api/admin/blog/posts/${s}`,e).then(a=>{console.log(a),this.$wkToast(a.data.message,{horizontalPosition:"right",verticalPosition:"top",transition:"fade"})}).catch(a=>{console.log(a)})}}},d=s=>(E("data-v-605626d7"),s=s(),T(),s),k={class:"content-wrapper"},I={class:"content"},A={class:"container-fluid"},F={class:"card"},U=d(()=>t("div",{class:"card-header"},[t("h3",{class:"card-title"},"Create post")],-1)),H={class:"card-body"},M={class:"form-group mb-5"},S={class:"row"},D=d(()=>t("div",{class:"col-md-2"},[t("label",{for:"title"},"Post title")],-1)),N={class:"col-md-10"},j={class:"form-group mb-5"},L={class:"row"},Q=d(()=>t("div",{class:"col-md-2"},[t("label",null,"Category")],-1)),R={class:"col-md-10"},q={class:"form-group mb-5"},G={class:"row"},J=d(()=>t("div",{class:"col-md-2"},[t("label",null,"Title image")],-1)),K={class:"col-md-10"},O={ref:"dropzone",class:"dropzone p-3 text-white",id:"title_image"},W=d(()=>t("div",{class:"dz-message"},[t("h5",{class:"text-center"},"Add images")],-1)),X=[W],Y={class:"form-group mb-5"},Z={class:"row"},$=d(()=>t("div",{class:"col-md-2"},[t("label",null,"Content")],-1)),tt={class:"col-md-10"},et={class:"form-group mb-5"},st={class:"row"},ot=d(()=>t("div",{class:"col-md-2"},[t("label",null,"Tags")],-1)),at={class:"col-md-10"},it={class:"form-group mb-5"},dt={class:"row"},lt=d(()=>t("div",{class:"col-md-2"},[t("label",null,"Status")],-1)),nt={class:"col-md-10"},ct=y(" Published "),rt={class:"card-footer"};function pt(s,e,r,a,o,l){const p=m("BreadcrumbsComponent"),_=m("multiselect"),u=m("VueEditor");return f(),V("div",k,[c(p),t("section",I,[t("div",A,[t("div",F,[U,t("div",H,[t("div",M,[t("div",S,[D,t("div",N,[g(t("input",{type:"text","onUpdate:modelValue":e[0]||(e[0]=i=>o.title=i),id:"title",class:"form-control"},null,512),[[w,o.title]])])])]),t("div",j,[t("div",L,[Q,t("div",R,[c(_,{modelValue:o.selectedCategory,"onUpdate:modelValue":e[1]||(e[1]=i=>o.selectedCategory=i),valueProp:"id",object:!0,label:"title",options:o.categories},null,8,["modelValue","options"])])])]),t("div",q,[t("div",G,[J,t("div",K,[t("div",O,X,512)])])]),t("div",Y,[t("div",Z,[$,t("div",tt,[c(u,{modelValue:o.content,"onUpdate:modelValue":e[2]||(e[2]=i=>o.content=i),useCustomImageHandler:"",onImageAdded:l.imageHandler},null,8,["modelValue","onImageAdded"])])])]),t("div",et,[t("div",st,[ot,t("div",at,[c(_,{modelValue:o.selectedTag,"onUpdate:modelValue":e[3]||(e[3]=i=>o.selectedTag=i),id:"tags",mode:"tags","close-on-select":!1,searchable:!0,label:"title",valueProp:"id","create-option":!0,object:!0,options:o.tags},null,8,["modelValue","options"])])])]),t("div",it,[t("div",dt,[lt,t("div",nt,[g(t("input",{type:"checkbox","onUpdate:modelValue":e[4]||(e[4]=i=>o.status=i)},null,512),[[C,o.status]]),ct])])])]),t("div",rt,[t("button",{onClick:e[5]||(e[5]=x(i=>l.update(this.post.id),["prevent"])),type:"submit",class:"btn btn-primary"},"Update")])])])])])}const vt=b(B,[["render",pt],["__scopeId","data-v-605626d7"]]);export{vt as default};