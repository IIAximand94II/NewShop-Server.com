<template>
    <div class="form-group">
        <div class="row">
            <label>Sizes</label>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>All</label>
                <div>
                    <button @click.prevent="addToSelect" class="btn-block btn-primary mb-1"> add </button>
                    <select @change.prevent="selectSize($event)" class="listbox container-fluid" multiple="multiple">
                        <template v-for="size in sizes">
                            <option id="select-option-1" :value="size.value">{{ size.label }}</option>
                        </template>
                    </select>
                </div>

            </div>
            <div class="col-md-6">
                <label>Selected</label>
                <div>
                    <button @click.prevent="removeFromAddedSize" class="btn-block btn-danger mb-1"> remove </button>
                    <select @change.prevent="selectSize($event)" class="listbox container-fluid" multiple="multiple">
                        <template v-if="addedSizes" v-for="selectSize in addedSizes">
                            <option :value="selectSize.value">{{ selectSize.label }}</option>
                        </template>
                    </select>
                    <span class="fa-pull-right">Total added size: {{ totalSelectSizes }}</span>
                </div>

            </div>
            <!-- /.col -->
        </div>
    </div>
</template>

<script>
export default {
    name: "ListBoxComponent",

    data(){
        return{
            selectedSize:0,

            addedSizes:[],
            totalSelectSizes: 0,
        }
    },

    props:{
        sizes: Object,
    },

    methods:{
        addToSelect(){
            let el = this.selectedSize;
            let add = this.sizes.find(elem => elem.value == el)
            this.addedSizes.push(add)
            this.totalSelectSizes = this.addedSizes.length
        },

        removeFromAddedSize(){
            let el = this.selectedSize;
            let del = this.addedSizes.findIndex(elem => elem.value == el)
            this.addedSizes.splice(del, 1);
            this.totalSelectSizes = this.addedSizes.length
        },

        selectSize(e){
            this.selectedSize = e.target.value;
        }
    }
}
</script>

<style scoped>

</style>
