<template>
    <v-footer
        dark
        padless
        min-width="100%"
    >
        <v-card
            flat
            tile
            class="indigo lighten-1 white--text text-center"
            min-width="100%"
        >
            <v-card-text>
                <v-btn
                    v-for="icon in icons"
                    :key="icon"
                    class="mx-4 white--text"
                    icon
                >
                    <v-icon size="24px">
                        {{ icon }}
                    </v-icon>
                </v-btn>
            </v-card-text>

            <v-card-text class="white--text pt-0">
                {{ $t('follow_us') }}
            </v-card-text>

            <v-divider></v-divider>

            <v-card-text class="white--text">
                ©{{ new Date().getFullYear() }}
            </v-card-text>
        </v-card>
    </v-footer>
</template>

<script>
export default {
    name: "front_footer",
    data: () => ({
        icons: [
            'mdi-facebook',
            'mdi-twitter',
            'mdi-linkedin',
            'mdi-instagram',
        ],
    })
}
</script>

<style scoped>
</style>
