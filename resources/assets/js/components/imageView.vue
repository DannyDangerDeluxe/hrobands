<template>
    <div class="image-view">
        <div class="card-header">
            <h3>{{ title }}</h3>
        </div>
        <div class="card-body">
            <div class="img-galery padding-sm">
                <div class="img-container">
                    <div class="img-preview" v-for="image in images">
                        <img :src="image.path" :alt="image.alt">
                        <div class="name"><span class="title">{{ lang.image_name }}:</span> {{ image.name }}</div>
                        <div class="undertitle"><span class="title">{{ lang.image_undertitle }}:</span> {{ image.undertitle }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'imageView',
        props: ['images', 'lang', 'title'],
        mounted() {
            console.log('Component Image View mounted.');
        }
    }
</script>

<style scoped>
    .img-container{
        display: flex;
    }

    .img-preview{
        border: 1px solid #abd;
        float: left;
        width: 31%;
        padding: 0.5em;
        margin: 10px auto;
    }
</style>