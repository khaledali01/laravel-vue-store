<template>
    <div class="cont pa-2">
        <lang-changed @langChanged="fetchProducts"/>
        <v-carousel cycle>
            <v-carousel-item
                v-for="(img, i) in sliderImgs"
                :key="i"
            >
                <v-img :src="img"/>
            </v-carousel-item>
        </v-carousel>
        <v-card-title class="mt-4 justify-center">შეუკვეთე მარტივად</v-card-title>
        <order-time-line/>
        <v-card-title class="mt-8 justify-center">ახალი დამატებული პროდუქტები</v-card-title>
        <div class="products mt-4">
            <v-card
                class="mx-auto"
                max-width="374"
                v-for="product in products"
                :key="product.id"
                :to="{ name:'product', params: { slug: product.slug } }"
            >
                <template slot="progress">
                    <v-progress-linear
                        color="deep-purple"
                        height="10"
                        indeterminate
                    ></v-progress-linear>
                </template>

                <v-img
                    height="250"
                    :src="product.img"
                ></v-img>

                <v-card-title class="pb-0">{{ product.name }}</v-card-title>

                <v-card-text>
                    <div class="my-1 text-subtitle-1">
                        {{ product.price }} ₾
                    </div>

                    <div>
                        {{ product.descr }}
                    </div>
                </v-card-text>
            </v-card>
        </div>
    </div>
</template>

<script>
import {request} from "../app";
import langChanged from "../components/langChanged";
import orderTimeLine from "../components/front/order-time-line"

export default {
    name: "Home",
    components: {
        langChanged,
        orderTimeLine
    },
    data() {
        return {
            products: [],
            sliderImgs: [
                '/imgs/slide2.jpg',
                '/imgs/slide3.jpg'
            ],
        }
    },
    mounted() {
        this.fetchProducts()
    },
    methods: {
        fetchProducts() {
            request.get('/api/products')
                .then((response) => {
                    this.products = response.data
                    if (this.products.length > 6)
                        this.products.length = 6
                })
        },
    }
}
</script>

<style lang="scss">
.cont {
    max-width: 1400px;
    margin: 0 auto;
}

.products {
    display: grid;
    grid-template-columns: repeat(auto-fill, 374px);
    gap: 30px;
    justify-content: space-around;
}
</style>


