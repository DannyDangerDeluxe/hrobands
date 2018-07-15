<template>
    <div class="container">
        <h1>{{ headline }}</h1>

        <div v-if="bands && bands.length > 0" v-for="band in bands" class="band-container padding-sm margin-md-bottom row">
            <div v-if="band.path === null" class="col s12">
                <div class="col s12">
                    <div class="section no-btm-padding">
                        <h2 class="no-padding no-margin block">{{ band.name }}</h2>
                    </div>

                    <div class="divider margin-sm-top margin-sm-bottom"></div>

                    <div class="section no-padding">
                        <span class="no-padding padding-sm-right title col m6">
                            <b>{{ lang.band_website }}</b>
                            <a v-bind:href="band.website">{{ band.website }}</a>
                        </span>
                        <span class="no-padding padding-sm-right title col m3">
                            <b>{{ lang.band_genre }}:</b> 
                            {{ band.genre }}
                        </span> 
                        <span class="no-padding title m3">
                            <b>{{ lang.band_founded_year }}:</b> 
                            {{ band.founded }}
                        </span>
                    </div> 
                </div>

                <div class="divider margin-sm-top margin-sm-bottom col"></div>

                <div class="col s12 margin-sm-bottom">
                    {{ band.text }}
                </div>
            </div>
                
            <div v-else>
                <div class="col l9">
                    <div class="col s12">
                        <div class="section no-btm-padding">
                            <h2 class="no-padding no-margin block">
                                {{ band.name }}
                            </h2>
                        </div>

                        <div class="divider margin-sm-top margin-sm-bottom"></div>

                        <div class="section no-padding">
                            <div class="no-padding padding-sm-right title col m6">
                                <b>{{ lang.band_website }}</b>
                                <a v-bind:href="band.website">{{ band.website }}</a>
                            </div>
                            <div class="no-padding padding-sm-right title col m3">
                                <b>{{ lang.band_genre }}:</b> 
                                {{ band.genre }}
                            </div> 
                            <div class="no-padding title m3">
                                <b>{{ lang.band_founded_year }}:</b> 
                                {{ band.founded }}
                            </div>
                        </div>
                        
                        <div class="divider margin-sm-top margin-sm-bottom"></div>  
                    </div>


                    <div class="col s12">
                        {{ band.text }}
                    </div> 
                </div>
                <div class="col s3 no-right-padding">
                    <img :src="band.path" :alt="band.alt">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'latestBands',
        props: ['bands', 'lang', 'headline'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
