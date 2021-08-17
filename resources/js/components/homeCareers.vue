<template>
    <div id="homeCareers" class="container">
        <div class="col-12">
            <h2 class="text-center">
                <i class="fab fa-searchengin mr-2 ml-2 fx-2"></i>
                    {{lang.new_career}}
            </h2>
        </div>
        <div v-if="search" class="col-md-6 ">
            <h2  class="text-style "> <u> {{search}} </u> </h2>
        </div>
        <div class="row mt-4">
            <div class="col-md-3 p-0 blog" style="background:#fff; border: 2px solid #e0e0e0;" id="blog">
                    <div class="col-md-12 p-3">
                        <h5 > <i class="fas fa-search mr-2 ml-2"></i> {{lang.search}} </h5>
                        <div class="card-body p-0 mt-1">
                            <input list="search_careers" class="form-control dynamic" name="search" v-model="search" id="search_careers" :placeholder="lang.search">
                            <datalist id="search_careers"></datalist>
                        </div>
                    </div>

                    <hr class="m-0">
                    <div class="col-md-12 p-0 mt-3">
                        <h5> <i class="fas fa-money-bill-wave mr-2 ml-2"></i>  {{lang.salary}} </h5>
                        <div class="card-body">
                            <label for="max_price"> {{lang.max_price}} : {{mx_price}}</label>
                            <input type="range"  class="col-md-12 p-0" name="max_price" v-model="mx_price" :min="min_price" :max="max_price" >
                            <label for="min_price"> {{lang.min_price}} : {{mn_price}}</label>
                            <input type="range" class="col-md-12 p-0" name="min_price" v-model="mn_price" :min="min_price" :max="max_price">
                        </div>
                    </div>

                    <hr class="m-0">

                    <div class="col-md-12 p-0 mt-3">
                        <h5> <i class="fab fa-searchengin mr-2 ml-2" style="font-size: 1.5em;"></i> {{lang.career_system}} </h5>
                        <div class="card-body">

                            <div class="col-md-12">
                                <input  type="checkbox" v-model="system_career" value="0" name="system_career" id="unlimited_period">
                                <label for="unlimited_period"> {{lang.system1}} </label>
                            </div>
                            <div class="col-md-12">
                                <input  type="checkbox" v-model="system_career" value="1" name="system_career" id="limited_time">
                                <label for="limited_time"> {{lang.system2}} </label>
                            </div>
                            <div class="col-md-12">
                                <input type="checkbox" v-model="system_career" value="2" name="system_career" id="employment_contract">
                                <label for="employment_contract"> {{lang.system3}} </label>
                            </div>
                        </div>
                    </div>

                    <!--
                    <hr class="m-0">
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
                    </div>
                    -->
            </div> <!-- End blog sidebar -->

            <div class="col-md-9  stores-box">
                <div class="col-md-12 p-0">
                    <div v-for="career in careers" :key="career.index" v-if="career.salary <= mx_price && career.salary >= mn_price && system_career.includes(String(career.career_system))" class=" mb-3  p-0">
                        <div class="card" >
                            <div class="col-md-12  p-0">
                                <div class="row">
                                    <div class="col-2 p-0" style="max-height: 95px; overflow:hidden">
                                        <img v-if="career.store.image" :src="'/img/stores/'+career.store.image" class="image-career-store" alt="Store Image">
                                        <img v-else src="/img/stores/default.jpg" class="image-career-store" alt="Store Image">
                                    </div>
                                    <div class="col-10 p-0">
                                        <a :href="'/store/'+career.store.id" class="m-0"> <h3 class="p-2 m-0 text-capitalize"> <i class="fas fa-store mr-2 ml-2"> </i> {{career.store.name}} </h3> </a>
                                        <a :href="'/store/'+career.store.id" class="m-0 text-dark"> <p class="pr-2 pl-2 m-0 mb-1"> <i class="fas fa-calendar-alt mr-2 ml-2"></i> <strong> {{career.date}} </strong> </p></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <hr class="m-0">
                                <h4 class="text-success mt-3" :class="getFloat()"> <strong> {{career.salary}} {{career.store.currency}} </strong> </h4>
                                <h5 class="h4 text-capitalize mt-3"> <i class="fas fa-briefcase"></i> {{career.name}} </h5>
                                <h6 style="line-height: 34px;" class=" text-capitalize"> {{career.des}} </h6>
                                <h6 v-if="career.store.phone" style="line-height: 34px;" class=" text-capitalize"> <i class="fas fa-mobile-alt mr-2 ml-2"></i> {{career.store.phone}} </h6>

                                <p>
                                    <strong> <i class="fab fa-searchengin mr-2 ml-2" style="font-size: 1.2em;"></i>  {{lang.career_system}} :  </strong>
                                    <span v-if="career.career_system == 0"> {{lang.system1}} </span>
                                    <span v-if="career.career_system == 1"> {{lang.system2}} </span>
                                    <span v-if="career.career_system == 2"> {{lang.system3}} </span>
                                </p>
                                <p v-if="career.store.country" > <strong> <i class="fas fa-globe mr-2 ml-2"></i> {{lang.country}} : </strong> {{career.store.country}} </p>
                            </div>
                        </div>
                    </div>

                    <div v-if="search.lenght == 0 && careers.length == 0"> <h1 class="text-danger text-center col-md-12 mt-5"> {{lang.no_job}} </h1> </div>
                    <div v-if="search.lenght != 0 && careers.length == 0"> <h1 class="text-danger text-center col-md-12 mt-5"> {{lang.career_empty}} </h1> </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'homeCareers',
        props: ['locale'],
        data: function ()
        {
            return {
                name: 'homeCareers',
                careers: {},
                search: '',
                countrys: {},
                lang: {},
                country_selected: '',
                system_career: ['0', '1', '2'],
                max_price: 0,
                mx_price: 0,
                min_price: 0,
                mn_price: 0,
                // about: 'name'
            }
        },
        mounted()
        {
            this.getcareers()
            this.getlang()
        },
        watch: {
            search() {
                this.searchcareers();
            },
        },
        methods:
        {
            getcareers: function ()
            {
                axios.get(`/api/getcareers`)
                .then(res => {
                    this.careers = res.data.careers;
                    this.countrys = JSON.parse(res.data.countrys);
                    this.max_price  = res.data.max_price;
                    this.min_price = res.data.min_price;
                    this.mx_price = res.data.max_price;
                    this.mn_price = res.data.min_price;
                });
            },
            searchcareers: function ()
            {
                axios.get(`/api/searchcareer?search=${this.search}`)
                // axios.get(`/api/searchcareer?search=${this.search}&about=${this.about}`)
                .then(res => {
                    this.careers = res.data.careers;
                    this.max_price  = res.data.max_price.salary;
                    this.min_price  = res.data.min_price.salary;
                    this.mx_price   = res.data.max_price.salary;
                    this.mn_price   = res.data.min_price.salary;
                });
            },
            getFloat: function ()
            {
                if (this.locale == 'ar')
                    return 'float-start';
                else
                    return 'float-end'
            },
            getlang :  function ()
            {
                if (this.locale == 'ar')
                {
                    this.lang = {
                        search:         ' بحث ',
                        salary:         ' الراتب ',
                        max_price:      ' أعلي راتب ',
                        min_price:      ' أقل راتب ',
                        career_system:  ' نظام الوظيفة ',
                        system1:        ' فترة غير محدودة ',
                        system2:        ' فترة محدودة ',
                        system3:        ' عقد عمل ',
                        no_job:         ' لا يوجد وظائف حاليا ',
                        career_empty:   ' هذه النتائج غير موجودة قم بالبحث مرة اخري ',
                        new_career:     ' ابحث عن وظيفة جديدة ',
                        country:        ' البلد ',

                    }
                } else {
                    this.lang = {
                        search:         'Search',
                        salary:         'Salary',
                        max_price:      'Maximum Price',
                        min_price:      'Minimum Price',
                        career_system:  'Career System',
                        system1:        'Unlimited Period',
                        system2:        'Limited Time',
                        system3:        'Employment contract',
                        no_job:         ' There are no jobs at the moment ',
                        career_empty:   'These results are not found, please search again',
                        new_career:     'Searching for a new job',
                        country:        'The Country',
                    }
                }
            }
        }
    }
</script>
