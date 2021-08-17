<template>
    <div style="padding: 0 15px 0 15px;">
        <h1 class="text-style">
            <i class="fas fa-shopping-cart"></i>
            {{lang.watch_and_pay}}
        </h1>
            <hr>
        <div class="row">
            <div class="col-md-9">
                <table class="table">
                    <thead class="thead-dark ">
                        <tr class="text-center">
                            <th scope="col"> # </th>
                            <th scope="col"> {{lang.name}} </th>
                            <th scope="col"> {{lang.price}} </th>
                            <th scope="col"> {{lang.count}} </th>
                            <th scope="col"> {{lang.status}} </th>
                            <th scope="col"> {{lang.pay_status}}</th>
                            <th scope="col"> {{lang.control}}</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr v-for="(order, index) in orders" :key="order.index" class="bg-light text-center">
                            <th scope="row"> {{index +1 }} </th>
                            <td class="text-center"><a href="#" class="bold text-dark">{{order.name}}</a></td>
                            <td id="price" class="price">{{order.price}}</td>
                            <td>
                                {{order.count}}
                            <!--
                                <input type="number" :data-count="index" min="1" class="form-control text-center item-count" :value="order.count" :data-order="order.id" id="order-count"></input>
                            -->
                            </td>
                            <td>
                                <p v-if="order.status == 0" class="text-dark bold"> {{lang.demand}} </p>
                                <p v-else class="text-success bold"> {{lang.recipient}} </p>
                            </td>
                            <td>
                                <p v-if="order.pay_status == 0" class="text-danger bold"> {{lang.paiement_when_recieving}} </p>
                                <p v-else class="text-success bold"> {{lang.the_payment_was_made}} </p>
                            </td>
                            <td class="p-0">
                                <!-- modal Show Order Ditalse -->
                                <button type="button" class="btn btn-info mb-1" data-bs-toggle="modal" :data-bs-target="'#staticBackdroporder'+order.id">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" :id="'staticBackdroporder'+order.id" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="text-align:left">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel"> <strong> {{order.name}} </strong> </h5>
                                            <button type="button" class="btn " data-bs-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            </div>
                                            <div class="modal-body text-left">
                                                <h6> <strong> {{lang.name}} : </strong> <span>{{order.name}}</span> </h6>
                                                <h6 v-if="order.des"> <strong> {{lang.des}} : </strong>  <span>{{order.des}}  </span> </h6>
                                                <h6> <strong> {{lang.count}} : </strong> <span>{{order.count}}  </span></h6>
                                                <h6 v-if="order.color"> <strong> {{lang.item_color}}  : </strong>  <input type="color" :value="order.color" disabled> </h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> {{lang.close}} </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button trigger modal -->
                                <button class="btn btn-danger mb-1 " data-toggle="modal" :data-target="'#exampleModal'+order.id">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" :id="'exampleModal'+order.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> {{order.name}} </h5>
                                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close" >
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            {{lang.conf_delete}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                {{lang.close}}
                                            </button>
                                            <a :href="'/store/order/delete/'+order.id" class="btn btn-danger mb-1 delete_order">
                                                <i class="fas fa-trash"></i>
                                                {{lang.delete}}
                                            </a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-danger text-center mt-3 mb-3 p-3 h4" v-if="orders == false">
                    {{lang.order_empty}}
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default total-box">
                    <div class="panel-heading">
                        <h4 class="panel-title bg-dark text-light p-3 total-title">
                            {{lang.order_des}}
                        </h4>
                    </div>
                    <div class="panel-body bg-light">
                        <div class="col-md-12">
                            <h5> {{lang.items_count}} : <span id="items-count"> {{orders_count}} </span> </h5>
                            <hr>
                            <!-- <form action="{shopperResultUrl}" class="paymentWidgets" data-brands="VISA MASTER AMEX">
                            </form> -->
                            <!-- <form action="#" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form> -->
                            <!-- <form action="{{route('store.orders', $store->id)}}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form> -->
                            <h4> {{lang.total}} : <span id="total-price"> {{orders_total}} $ </span> </h4>
                            <button class="btn btn-warning col-md-12 p-3" >
                                <h4 class="text-center">
                                    <i class="far fa-credit-card"></i>
                                    {{lang.pay_now}}
                                </h4>
                            </button>
                            <p class="text-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                                {{lang.payment_soon}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'userOrders',
    props: ['store_id', 'user_id', 'locale'],
    data: function ()
    {
        return {
            orders: {},
            orders_count: 0,
            orders_total: 0,
            total: 0,
            lang: {},
        }
    },
    mounted() {
        this.getorders();
        this.getlang();
    },
    methods:
    {
        getorders: function ()
        {
            axios.get(`/api/getorders/${this.store_id}/${this.user_id}`)
            .then(res => {
                this.orders = res.data.orders
                this.orders_count = res.data.orders_count
                this.orders_total = res.data.orders_total
            })
            // .catch(err => console.log(err))
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
                    name                : ' الأسم ',
                    count               : ' العدد ',
                    close               : ' أغلاق ',
                    delete              : ' حذف ',
                    status              : ' الحالة ',
                    pay_status          : ' حالة الدفع',
                    controllers         : ' التحكم ',
                    conf_delete         : ' هل أنت متأكد من الحذف ؟ ',
                    order_des           : ' تفاصيل الطلب ',
                    items_count         : ' عدد العناصر ',
                    total               : ' المجموع ',
                    pay_now             : ' أدفع الأن',
                    payment_soon        : ' الدفع الاونلاين قريبا ',
                    demand              : ' تحت الطلب ',
                    recipient           : ' أنتهي الطلب ',
                    paiement_when_recieving :   ' الدفع عند الاستلام ',
                    the_payment_was_made : ' تم الدفع ',
                    watch_and_pay       : ' المشاهدة و الدفع ',
                    order_empty         : ' صندوق الطلبات الخاص بك فارغ ',

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
                    des                 : ' Description',
                    name                : 'Name',
                    count               : 'Count',
                    close               : 'Close',
                    delete              : 'Delete',
                    status              : 'status',
                    pay_status          : 'Pay Status',
                    controllers         : 'Controllers',
                    conf_delete         : 'Are you sure to delete?',
                    order_des           : 'Order Descreption',
                    items_count         : 'items Count',
                    total               : 'Total',
                    pay_now             : 'Pay Now',
                    payment_soon        : 'Payment Soon',
                    demand              : 'Demand',
                    recipient           : 'Recipient',
                    paiement_when_recieving :   'Paiement when recieving',
                    the_payment_was_made : 'The payment was made',
                    watch_and_pay       : 'Watch And Pay',
                    order_empty         : 'Your order box is empty',
                }
            }
        }
    },
}

</script>
