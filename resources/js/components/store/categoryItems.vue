<template>
    <div class="row">
        <div v-for="item in items" :key="item.id"  class="col-md-4 mt-4 mt-lg-0 ">
            <div class="box box-item" data-aos="fade-up" data-aos-delay="400">
                <img v-if="item.image" :src="'/image/items/'+item.image" class="img-fluid" alt="item image">
                <img v-else src="/image/items/empty.jpg" class="img-fluid" alt="item image">
                <a :href="'/store/item/'+item.id"><h5 class="text-center p-2"> {{item.name}}</h5></a>
                <a :href="'/store/item/'+item.id"><p class="text-center text-dark"><span class="mr-2 bold"> {{item.price}}</span><span v-if="item.old_price" class="ml-2"> <del>{{item.old_price}}</del> </span></p></a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'frontItems',
    props: ['store_id'],
    data: function () {
        return {
            name: 'Our Values',
            items: {}
        }
    },
    mounted() {
        this.getitems();
    },
    methods: {
        getitems: function  () {
            axios.get(`/api/category_items/${this.store_id}`)
            .then(res => {
                this.items = res.data.items
            })
        },
    }
}
</script>
