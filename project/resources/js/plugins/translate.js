import VueI18n from 'vue-i18n'
import Vue from "vue";
import store from "../store";

Vue.use(VueI18n);

const translate = {
    ka: {
        home: 'მთავარი',
        name: 'სახელი',
        descr: 'აღწერა',
        price: 'ფასი',
        count: 'რაოდენობა',
        img: 'სურათი',
        add: 'დამატება',
        products: 'პროდუქტები',
        kilogram: 'კილოგრამი',
        follow_us: 'გამოგვყევით სოციალურ ქსელებეში',
        about_us: 'ჩვენს შესახებ'
    },
    en: {
        home: 'Home',
        name: 'Name',
        descr: 'Description',
        price: 'Price',
        count: 'Quantity',
        img: 'Image',
        add: 'Add',
        products: 'Products',
        kilogram: 'Kilogram',
        follow_us: 'Follow us on social media',
        about_us: 'About us'
    }
}
const i18n = new VueI18n({
    locale: store.state.lang,
    messages: translate,
})

export default i18n
