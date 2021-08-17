<template>
    <div class="container" style="margin-top:55px">
        <div class="best-items">
            <h1 class="p-3 text-style"> {{lang.best_items}} </h1>
            <hr>
            <div class="row">
                <div class="col-md-4 " v-for="item in bestitems" :key="item.index">
                    <div class="row">
                        <div class="col-3 p-0">
                            <div class="swiper-slide" v-if="item.image">
                                <img :src="'/image/items/'+item.image" class="image-res" :alt="item.name">
                            </div>
                        </div>
                        <div class="col-9 box-hover">
                            <a :href="'/store/item/'+item.id"> <h5 v-if="item.name" class="mt-3"> {{item.name}} </h5></a>
                            <a :href="'/store/item/'+item.id" class=" text-dark"> <p v-if="item.price"> <span class="mr-2"> {{item.price}} </span> <del> {{item.old_price}} </del> </p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="otjer-items">
            <h1 class="p-3 text-style"> {{lang.other_items}} </h1>
            <hr>
            <div class="row">
                <div class="col-md-4 " v-for="item in otheritems" :key="item.index">
                    <div class="row">
                        <div class="col-3 p-0">
                            <div class="swiper-slide" v-if="item.image">
                                <img :src="'/image/items/'+item.image" class="image-res" :alt="item.name">
                            </div>
                        </div>
                        <div class="col-9 box-hover">
                            <a :href="'/store/item/'+item.id"> <h5 v-if="item.name" class="mt-3"> {{item.name}} </h5></a>
                            <a :href="'/store/item/'+item.id" class=" text-dark"> <p v-if="item.price"> <span class="mr-2"> {{item.price}} </span> <del> {{item.old_price}} </del> </p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'bestItems',
    data() {
        return {
            bestitems: {},
            otheritems: {},
            lang: {},
        }
    },
    mounted() {
        // this.getbestitems()
        this.getotheritems()
        this.getlang()
    },
    methods: {
        getotheritems: function () {
            axios.get(`/api/getotheritems/3`)
            .then(res => {
                this.otheritems = res.data.other_items;
                this.bestitems = res.data.best_items;
            })
        },
        getlang() {
            if (this.locale == 'ar')
            {
                this.lang = {
                    best_items          : ' أفضل العناصر ',
                    other_items         : ' عناصر اخري ',
                }
            } else {
                this.lang = {
                    best_items          : 'Best Items',
                    other_items         : 'Other Items',
                }
            }
        }
    },
    props: ['store_id', 'locale'],
}
</script>
