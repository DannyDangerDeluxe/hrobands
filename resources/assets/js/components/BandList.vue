<template>
	<div class="band-list">
		<div class="card">
			<div class="card-header">
				<h3>{{title}}</h3>
			</div>
			<div class="card-body">
				<div v-for="band in fullBands" class="preview margin-sm-bottom">
					<div class="data col-xs-12 col-md-9 float-left">
						<div class="name">
							<h4>{{ band.band.name }}</h4>
						</div>
						<div class="info margin-sm-top">
							<div class="form-group no-margin no-padding col-xs-12 col-md-6 float-left">
								{{ lang.place }}: {{ band.band.location }}
							</div>
							<div class="form-group no-margin no-padding col-xs-12 col-md-6 float-left">
								{{ lang.date }}: {{ band.date }}
							</div>
							<div v-if="band.band.open_doors" class="form-group no-margin no-padding col-xs-12 col-md-6 float-left">
								{{ lang.openDoors }}: {{ band.band.open_doors }} 
							</div>
							<div v-if="band.band.price" class="form-group no-margin no-padding col-xs-12 col-md-6 float-left">
								{{ lang.price }}: {{ band.band.price }} 
							</div>
							<div v-if="band.band.description" class="form-group no-margin no-padding col-xs-12 col-md-12">
								{{ lang.desc }}: {{ band.band.description }} 
							</div>

							<div class="form-group no-margin no-padding margin-sm-right col-xs-12">
								<a :href="'/bands/' + band.band.id" class="btn btn-primary margin-sm-right">{{ lang.read_more }}</a>
								<a v-if="band.band.link" :href="band.band.link" class="btn btn-primary">{{ lang.link }}</a>
							</div>
						</div>
					</div>
					<div class="image col-xs-12 col-md-3 float-right">
						<img :src="'/' + band.image.path">
					</div>
					<div class="float-none"></div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        name: 'bandList',
        props: ['lang', 'title', 'bands', 'images'],
        computed: {
        	fullBands () {
        		return this.bands.map((band, i) => {
					return {
						band: band,
						image: this.images[i],
					}
				})
        	}
        },
        created: function() {
        	console.log('Component BandList created');
        }
    }
</script>