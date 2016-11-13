import Cycles from './Cycles.vue'
Vue.component('cycles', Cycles)

import Ops from './Ops.vue'
Vue.component('ops', Ops)

import Strains from './Strains.vue'
Vue.component('strains', Strains)

Vue.component('home', {
    props: ['user'],
    data() {
        return {
        }
    }
});
