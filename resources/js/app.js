
import './bootstrap';
import Vue from 'vue';
import VModal from 'vue-js-modal';
import VueEllipseProgress from 'vue-ellipse-progress';






Vue.use(VModal);
Vue.use(VueEllipseProgress);






Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dropdown', require('./components/DropdownComponent.vue').default);
Vue.component('sites-modal', require('./components/SitesModal.vue').default);
Vue.component('supplier-form-component', require('./components/SupplierFormComponent.vue').default);
Vue.component('supplier-search-component', require('./components/SupplierSearchComponent.vue').default);
Vue.component('pagination-component', require('./components/PaginationComponent.vue').default);






const app = new Vue({
    el: '#app',
});
