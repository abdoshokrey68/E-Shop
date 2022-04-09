<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3 blog" id="blog">
                <div class="sidebar p-2">
                    <h3 class="sidebar-title">
                        <i class="fas fa-search"></i> {{ lang.search }}
                    </h3>
                    <div class="sidebar-item search-form">
                        <input
                            list="search"
                            class="form-control dynamic"
                            name="search"
                            v-model="search"
                            id="search"
                            placeholder="Search"
                        />
                        <datalist id="search">
                            <option
                                v-for="store in stores"
                                :key="store.index"
                                value=""
                            >
                                {{ store.name }}
                            </option>
                        </datalist>
                    </div>
                    <!-- End sidebar search formn-->

                    <hr />

                    <div class="sidebar-item categories p-2 m-0">
                        <h3 class="sidebar-title">
                            <i class="fas fa-truck mr-2 ml-2"></i>
                            {{ lang.delivery }}
                        </h3>
                        <ul>
                            <li class="m-0">
                                <input
                                    type="checkbox"
                                    v-model="store_delivery"
                                    value="1"
                                    name="store_delivery"
                                    id="deli_available"
                                />
                                <label for="deli_available">
                                    {{ lang.available }}
                                </label>
                            </li>
                            <li class="m-0">
                                <input
                                    type="checkbox"
                                    v-model="store_delivery"
                                    value="0"
                                    name="store_delivery"
                                    id="deli_notavailable"
                                />
                                <label for="deli_notavailable">
                                    {{ lang.not_available }}
                                </label>
                            </li>
                        </ul>
                    </div>
                    <!-- End Delivary -->

                    <hr />

                    <div class="sidebar-item categories p-2 m-0">
                        <h3 class="sidebar-title">
                            <i class="fas fa-money-check mr-2 ml-2"></i>
                            {{ lang.payment }}
                        </h3>
                        <ul>
                            <li>
                                <input
                                    type="checkbox"
                                    v-model="store_payment"
                                    value="1"
                                    name="store_payment"
                                    id="pay_available"
                                />
                                <label for="pay_available">
                                    {{ lang.available }}
                                </label>
                            </li>
                            <li>
                                <input
                                    type="checkbox"
                                    v-model="store_payment"
                                    value="0"
                                    name="store_payment"
                                    id="pay_notavailable"
                                />
                                <label for="pay_notavailable">
                                    {{ lang.not_available }}
                                </label>
                            </li>
                        </ul>
                    </div>
                    <!-- End Delivary -->

                    <!-- <hr>
                    <div class="col-md-12 p-0 mt-3">
                        <h5> <i class="fas fa-globe-americas mr-2 ml-2" ></i> country </h5>
                        <div class="card-body">
                            <select name="country" v-model="country_selected" class="col-md-12 form-control" id="country">
                                <option value="all" selected> Select Any Country </option>
                                <option v-for="country in countrys" :key="country.index" :value="country" >
                                    {{country}}
                                </option>
                            </select>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- End blog sidebar -->

            <div class="col-md-9 stores-box">
                <h1 class="col-md-12 text-center text-style">
                    <div class="fas fa-store"></div>
                    {{ lang.markets }}
                </h1>
                <h5 v-if="search" class="mb-2 h4">{{ search }}</h5>
                <hr />
                <br />
                <div class="row" id="all-stores">
                    <div
                        v-for="store in stores"
                        :key="store.index"
                        v-if="
                            store_delivery.includes(String(store.delivery)) &&
                                store_payment.includes(String(store.payment))
                        "
                        class="col-lg-3 col-md-6 mt-2 my-store"
                    >
                        <div class="icon-box store-box col-md-12 p-0">
                            <div class="">
                                <!-- <a :href="'/store/'+store.id" target="_blank"> -->
                                <img
                                    v-if="store.image"
                                    :src="'/img/stores/' + store.image"
                                    class="home-stores-image"
                                    alt="store image"
                                />
                                <img
                                    v-else
                                    src="/img/stores/default.png"
                                    class="home-stores-image"
                                    alt="store image"
                                />
                                <!-- </a> -->
                            </div>
                            <a
                                :href="'/store/' + store.id"
                                target="_blank"
                                style="display:block"
                                class="h5 col-md-12 m-0 text-dark"
                            >
                                <h5 class="p-2">{{ store.name }}</h5></a
                            >
                        </div>
                    </div>
                    <div v-if="stores.length == 0 && search.length != 0">
                        <h2 class="text-danger col-md-12 text-center">
                            "{{ search }}" {{ lang.not_here }}
                        </h2>
                        <h4 class="text-danger">{{ lang.search_again }}</h4>
                    </div>
                    <div v-if="stores.length == 0 && search.length == 0">
                        <h2 class="text-danger col-md-12 text-center">
                            {{ lang.stores_empty }}
                        </h2>
                        <a href="/add_store">
                            <h4 class="text-danger">
                                {{ lang.add_new_store }}
                            </h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "homeStores",
    props: ["locale"],
    data: function() {
        return {
            stores: {},
            search: "",
            lang: {},
            store_delivery: ["0", "1"],
            store_payment: ["0", "1"],
            countrys: {},
            country_selected: ""
        };
    },
    mounted() {
        this.getstores();
        this.getlang();
    },
    watch: {
        search() {
            this.searchstores();
        }
    },
    methods: {
        getstores() {
            axios.get(`/api/getstores`).then(res => {
                this.stores = res.data.stores;
                // console.log(res)
                this.countrys = JSON.parse(res.data.countrys);
            });
        },
        searchstores() {
            axios.get(`/api/searchstores?search=${this.search}`).then(res => {
                this.stores = res.data;
            });
        },
        getlang: function() {
            if (this.locale == "ar") {
                this.lang = {
                    search: " بحث ",
                    salary: " الراتب ",
                    max_price: " أعلي راتب ",
                    min_price: " أقل راتب ",
                    career_system: " نظام الوظيفة ",
                    system1: " فترة غير محدودة ",
                    system2: " فترة محدودة ",
                    system3: " عقد عمل ",
                    no_job: " لا يوجد وظائف حاليا ",
                    career_empty: " هذه النتائج غير موجودة قم بالبحث مرة اخري ",
                    new_career: " ابحث عن وظيفة جديدة ",
                    country: " البلد ",
                    delivery: " التوصيل للمنازل ",
                    available: " متوفر ",
                    not_available: " غير متوفر ",
                    markets: " بعض اسواقنا ",
                    not_here: " ليس موجود ",
                    search_again: " أبحث مرة اخري ",
                    payment: " دفع الكتروني ",
                    stores_empty: " لا يوجد متاجر بعد ",
                    add_new_store: "قم بإضافة متجر خاص بك "
                };
            } else {
                this.lang = {
                    search: "Search",
                    salary: "Salary",
                    max_price: "Maximum Price",
                    min_price: "Minimum Price",
                    career_system: "Career System",
                    system1: "Unlimited Period",
                    system2: "Limited Time",
                    system3: "Employment contract",
                    no_job: " There are no jobs at the moment ",
                    career_empty:
                        "These results are not found, please search again",
                    new_career: "Searching for a new job",
                    country: "The Country",
                    delivery: " Delivery  ",
                    available: " Available ",
                    not_available: " Not Available ",
                    markets: " Some of our Markets ",
                    not_here: "isn't here",
                    search_again: "Search Again",
                    payment: " Payment ",
                    stores_empty: " There are no stores yet ",
                    add_new_store: "Add your own store"
                };
            }
        }
    }
};
</script>
