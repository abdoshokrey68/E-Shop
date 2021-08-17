<template>
    <div>
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2 class="text-center"> {{lang.our_products}} </h2>
                <p class="text-center"> {{lang.we_hope}} </p>
            </header>

            <div class="row">
                <div class="col-md-3">
                    <div class="row justify-content-center">
                        <div class="card p-0">
                            <div class="card-header">
                                <i class="fas fa-search mr-2 ml-2"></i>
                                {{lang.search}}
                            </div>
                            <div class="card-body">
                                <input type="text" name="search" v-model="search" class="form-control" :placeholder="lang.search">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="card p-0">
                            <div class="card-header">
                                <i class="fas fa-money-bill-wave"></i>
                                {{lang.item_price}}
                            </div>
                            <div class="card-body">
                                <label for="max_price"> {{lang.x_price}} : {{mx_price}}</label>
                                <input type="range" class="col-md-12" name="max_price" v-model="mx_price" :min="min_price" :max="max_price" >
                                <label for="min_price"> {{lang.n_price}} : {{mn_price}}</label>
                                <input type="range" class="col-md-12" name="min_price" v-model="mn_price" :min="min_price" :max="max_price">
                            </div>
                        </div>
                    </div>

                    <!--
                        <div class="sidebar-item categories  m-0">
                            <div class="card-header">
                                <h3 class="sidebar-title"> <i class="fas fa-money-check "></i> {{lang.category}} </h3>
                            </div>
                            <div class="card-body p-0">
                                <ul class="p-1">
                                    <li v-for="(category, index) in categorys" :key="category.index">
                                        <input type="checkbox" v-model="category_select" :value="category.id" name="store_category" checked :id="category.id">
                                        <label :for="category.id"> {{category.name}} </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    -->

                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div v-for="item in items" :key="item.id" v-if="item.price >= mx_price && item.price <= mn_price" class="col-md-4 mt-4 pt-2 pb-2 mt-lg-0 ">
                            <!--
                            <div v-if="category_select.includes(String(itemthis.categorys[l].category_id))" >
                            -->
                            <div class="box box-item" data-aos="fade-up" data-aos-delay="200" style="height:100%">
                                <div class="add-card btn btn-warning border-3 border-dark ">
                                    <a :href="'/store/add-to-cart/'+item.id" class="text-dark">
                                        <i class="fas fa-cart-plus fa-2x"></i>
                                    </a>
                                </div>
                                <img v-if="item.image" :src="'/image/items/'+item.image" class="img-fluid" alt="item image">
                                <img v-else src="/image/items/empty.jpg" class="img-fluid" alt="item image">
                                <a :href="'/store/item/'+item.id"><h3 class="text-center"> {{item.name}}</h3></a>
                                <a :href="'/store/item/'+item.id">
                                    <p class="text-center text-dark">
                                        <span class="mr-2 bold"> {{item.price}} </span>
                                        <span v-if="item.old_price" class="ml-2"> <del>{{item.old_price}}</del> {{currency}} </span>
                                    </p>
                                </a>

                            </div>
                        </div>
                        <div v-if="search.length != 0 && items.length == 0">
                            <h2 class="text-danger col-md-12 text-center"> "{{search}}" {{lang.not_here}} </h2>
                            <h4 class="text-danger text-center"> {{lang.search_again}} </h4>
                        </div>
                        <div v-if="search.length == 0 && items.length == 0">
                            <h2 class="text-danger col-md-12 text-center"> {{lang.item_empty}} </h2>
                            <h4 class="text-danger text-center"> {{lang.try_leter}} </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default
{
    name: 'frontItems',
    props: ['store_id', 'locale', 'currency'],

    data() {
        return {
            name: 'Our Values',
            items: {},
            categorys: {},
            search: '',
            max_price: 0,
            mx_price: 0,
            min_price: 0,
            mn_price: 0,
            category_select: [],
            lang: {}
        }
    },
    watch: {
        search() {
            this.searchitems();
        }
    },
    mounted() {
        this.getitems();
        this.getlang();
    },
    methods: {
        getitems: function ()
        {
            axios.get(`/api/storeinfo/${this.store_id}`)
            .then(res => {
                this.items = res.data.store_items
                this.max_price = res.data.max_price
                this.mx_price = res.data.max_price
                this.min_price = res.data.min_price
                this.mn_price = res.data.min_price
                this.categorys = res.data.categorys
            })
        },
        searchitems: function ()
        {
            axios.get(`/api/searchitems/${this.store_id}?search=${this.search}`)
            .then(res => {
                this.items = res.data.items
                this.max_price = res.data.max_price
                this.min_price = res.data.min_price
            })
        },
        getlang: function() {
            if (this.locale == 'ar')
            {
                this.lang = {
                    search              : ' بحث ',
                    item_price          : ' سعر العنصر ',
                    x_price             : ' أعلي سعر',
                    n_price             : ' أقل سعر ',
                    category            : ' القسم ',
                    not_here            : ' ليس موجود ',
                    search_again        : ' قم بالبحث مرة اخري ',
                    item_empty          : ' لا يوجد عناصر بالمتجر ',
                    try_leter           : ' حاول في وقت لاحق ',
                    our_products        : ' منتجاتنا ',
                    we_hope             : ' نحن في خدمتك ',
                    category            : ' الأقسام',
                }
            } else {
                this.lang = {
                    search              : ' Search ',
                    item_price          : 'Item Price',
                    x_price             : 'Maximum Price',
                    n_price             : 'Minimum Price',
                    category            : 'Category',
                    not_here            : 'isn\'t here',
                    search_again        : 'Search again',
                    item_empty          : 'There are no items in the store',
                    try_leter           : 'Try it later',
                    our_products        : 'Our products',
                    we_hope             : ' We are at your service ',
                    category            : ' Categories ',
                }
            }
        },
    },
}
// <a :href="'/store/item/'+item.name.replace(/\s+/g, '-')"><h3 class="text-center"> {{item.name}}</h3></a>
</script>


