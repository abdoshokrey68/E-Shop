<template>
    <div>

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                <li><a href="index.html"> {{lang.home}} </a></li>
                <li> {{lang.item_det}} </li>
                </ol>
                <h2> {{lang.item_det}} </h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper-container">
                    <div class="swiper-wrapper align-items-center">

                        <div class="swiper-slide" v-if="item.image">
                            <img :src="'/image/items/'+item.image" style="max-height: 600px;" alt="">
                        </div>

                        <div class="swiper-slide" v-if="item.image">
                            <img :src="'/image/items/'+item.image" style="max-height: 600px;" alt="">
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                    <h3 v-if="item.name"> {{item.name}} </h3>
                    <ul>
                        <li v-if="item.category.name"><strong> {{lang.category}} </strong>: {{item.category.name}} </li>
                        <li><strong> {{lang.price}} </strong>: {{item.price}} {{currency}} </li>
                        <li v-if="item.old_price"><strong> {{lang.old_price}} </strong>: <del>{{item.old_price}}</del> </li>
                        <li v-if="item.made"><strong> {{lang.made}} </strong>: {{item.made}} </li>

                        <li v-if="colors"><strong> {{lang.item_color}} </strong>:
                            <input v-for="color in colors" :key="color.index" type="color" disabled :value="color">
                        </li>

                        <li v-if="sizes"><strong> {{lang.item_size}} </strong>:
                            <span v-for="size in sizes" :key="size.index" class="">
                                <span v-if="size == 1"> XS </span>
                                <span v-if="size == 2"> S </span>
                                <span v-if="size == 3"> M </span>
                                <span v-if="size == 4"> L </span>
                                <span v-if="size == 5"> XL </span>
                                ,
                            </span>
                        </li>

                        <li v-if="tags != ''"><strong> {{lang.tags}} </strong>:
                            <a href="#" v-for="tag in tags" :key="tag.index" class=""> #{{tag}} </a>
                        </li>
                    </ul>
                    </div>
                    <div class="portfolio-description">
                        <p> <strong> {{lang.des}} : </strong> {{item.des}} </p>
                    </div>

                    <div v-if="order.item_id != item_id" class="col-12 mt-3">
                        <a :href="'/store/add-to-cart/'+item_id" class="p-2 col-12 btn btn-warning text-dark border-2 border-dark">
                            <h4 class="text-center m-0">
                                <i class="fas fa-cart-plus"></i>
                                {{lang.add_to_cart}}
                            </h4>
                        </a>
                    </div>
                    <div v-else class="col-12 mt-3">
                        <a :href="'/store/remove-from-cart/'+item_id" class="p-2 col-12 btn btn-danger text-light border-2 border-dark">
                            <h4 class="text-center m-0">
                                <i class="fas fa-trash-alt"></i>
                                {{lang.remove_from_cart}}
                            </h4>
                        </a>
                    </div>

                </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </div>
</template>

<script>
export default {
    name: 'itemInfo',
    props: ['item_id', 'locale', 'currency', 'user_id'],
    data() {
        return {
            item: {},
            sizes: '',
            colors: '',
            tags: '',
            lang: {},
            order: {},
        }
    },
    mounted() {
        this.getitem()
        this.getlang()
        this.getorder()
        // this.getitemdata()
    },
    methods: {
        getitem: function () {
            axios(`/api/iteminfo/${this.item_id}`)
            .then(res => {
                this.item = res.data

                if (res.data.tags != null)
                    this.tags = res.data.tags.split(',')

                if (res.data.color != null)
                    this.colors = res.data.color.split(',')

                if (res.data.size != null)
                    this.sizes = res.data.size.split(',')
            })
        },
        getorder: function () {
            axios(`/api/getorder/${this.item_id}/${this.user_id}`)
            .then(res => {
                this.order = res.data[0]
            })
        },
        getlang: function()
        {
            if (this.locale == 'ar')
            {
                this.lang = {
                    home                : ' الرئيسيى ',
                    item_det            : ' تفاصيل العنصر',
                    category            : ' القسم ',
                    price               : ' السعر ',
                    old_price           : ' السعر السابق ',
                    made                : ' الصنع ',
                    item_color          : ' لون العنصر',
                    item_size           : ' حجم العنصر ',
                    tags                : ' علامات ',
                    des                 : ' الوصف ',
                    add_to_cart         : ' أضف إلي العربة  ',
                    remove_from_cart    : ' إزالة من العربة ',
                }
            } else {
                this.lang = {
                    home                : ' home ',
                    item_det            : 'Item Details',
                    category            : 'Category',
                    price               : 'Price',
                    old_price           : 'Old Price',
                    made                : 'Made',
                    item_color          : 'Item Color',
                    item_size           : 'Item Size',
                    tags                : 'Tags',
                    des                 : ' Description ',
                    add_to_cart         : 'Add To Cart',
                    remove_from_cart    : 'Remove From Cart',
                }
            }
        }
    }
}
</script>
