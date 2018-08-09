<template>
    <div class="image-view">
        <div class="card-header">
            <h3>{{ title }}</h3>
        </div>
        <div class="card-body">
            <!--
            <div class="img-galery padding-sm">
                <div class="img-container">
                    <div class="img-preview" v-for="image in images">
                        <img :src="'/' + image.path" :alt="image.alt">
                        <div class="name"><span class="title">{{ lang.image_name }}:</span> {{ image.name }}</div>
                        <div class="undertitle"><span class="title">{{ lang.image_undertitle }}:</span> {{ image.undertitle }}</div>
                    </div>
                </div>
            </div>
            -->
            <coverflow :coverList="coverflowImages" :coverWidth="260" :index="1" :width="846"></coverflow>
        </div>
    </div>
</template>

<script>
    import coverflow from 'vue-coverflow';
    
    export default {
        name: 'imageView',
        props: ['images', 'lang', 'title'],
        mounted() {
            console.log('Component Image View mounted.');
        },
        components: {
            coverflow
        },
        computed: {
            coverflowImages: function(images){
                return this.images.map(function(image){
                    return {
                        cover: '/' + image.path,
                        title: image.name
                    }
                });
            }
        },
        data () {
            return {
                coverList: this.coverflowImages
            }
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