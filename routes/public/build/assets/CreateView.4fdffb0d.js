import{B as c}from"./BreadcrumbsComponent.9ca5c3f7.js";import{s as r}from"./default.css_vue_type_style_index_0_src_true_lang.40ff076f.js";import{_ as n,e as t,o as d,c as p,f as o,d as e,a as s}from"./app.84c357ef.js";const m={name:"CreateView",data(){return{tags:["Tag 1","Tag 2","Tag 3"]}},methods:{},components:{BreadcrumbsComponent:c,Multiselect:r}},u={class:"content-wrapper"},f={class:"content"},_={class:"container-fluid"},v={class:"card"},b=e("div",{class:"card-header"},[e("h3",{class:"card-title"},"Add product")],-1),g={class:"card-body"},h=s('<div class="form-group"><label for="title">Title</label><input type="text" value="" name="title" class="form-control" id="title" placeholder="Enter title"></div><div class="form-group"><label for="description">Description</label><textarea type="text" class="form-control" id="description" name="description"></textarea></div><div class="form-group"><label for="image">Product title image</label><div class="input-group"><div class="custom-file"><input type="file" class="custom-file-input" name="title_image" id="image"><label class="custom-file-label">Choose file</label></div><div class="input-group-append"><span class="input-group-text">Upload</span></div></div></div><div class="form-group"><label for="title">Category</label><select class="form-control" name="category_id"> Categories </select></div>',4),x={class:"form-group"},y=e("label",{for:"title"},"Multi select",-1),C=s('<div class="form-group"><label for="title">Gender</label><select class="form-control" name="gender"><option value="0">Female</option><option value="1">Male</option></select></div><div class="form-group"><label for="title">Status</label><select class="form-control" name="gender"><option value="in_stock">In Stock</option><option value="on_order">On Order</option><option value="no">Not</option></select></div><div class="form-group"><div class="form-check"><input class="form-check-input" name="sale" id="sale" type="checkbox"><label class="form-check-label" for="sale"> Published</label></div></div>',3),k=e("div",{class:"card-footer"},[e("button",{type:"submit",class:"btn btn-primary"},"Add")],-1);function B(V,N,T,w,l,M){const a=t("BreadcrumbsComponent"),i=t("multiselect");return d(),p("div",u,[o(a),e("section",f,[e("div",_,[e("div",v,[b,e("div",g,[h,e("div",x,[y,o(i,{options:l.tags},null,8,["options"])]),C]),k])])])])}const E=n(m,[["render",B]]);export{E as default};
