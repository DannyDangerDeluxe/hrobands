<template>
	<div class="gig-list">
		<div class="card">
			<div class="card-header">
				<h3>{{title}}</h3>
			</div>
			<div class="card-body">
				<div v-for="gig in fullGigs" class="preview margin-sm-bottom">
					<div class="data col-xs-12 col-md-9 float-left">
						<div class="name">
							<h4>{{ gig.gig.name }}</h4>
						</div>
						<div class="info margin-sm-top">
							<div class="form-group no-margin no-padding col-xs-12 col-md-6 float-left">
								{{ lang.place }}: {{ gig.gig.location }}
							</div>
							<div class="form-group no-margin no-padding col-xs-12 col-md-6 float-left">
								{{ lang.date }}: {{ gig.gig.date }}
							</div>
							<div v-if="gig.gig.price" class="form-group no-margin no-padding col-xs-12 col-md-6 float-left">
								{{ lang.openDoors }}: {{ gig.gig.open_doors }} 
							</div>
							<div v-if="gig.gig.price" class="form-group no-margin no-padding col-xs-12 col-md-6 float-left">
								{{ lang.price }}: {{ gig.gig.price }} 
							</div>
							<div v-if="gig.gig.price" class="form-group no-margin no-padding col-xs-12 col-md-12">
								{{ lang.desc }}: {{ gig.gig.description }} 
							</div>
						</div>
					</div>
					<div class="image col-xs-12 col-md-3 float-right">
						<img :src="'/' + gig.image.path">
					</div>
					<div class="float-none"></div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        name: 'gigList',
        props: ['lang', 'title', 'gigs', 'images'],
        computed: {
        	fullGigs () {
        		return this.gigs.map((gig, i) => {
					return {
						gig: gig,
						image: this.images[i]
					}
				})
        	}
        },
        created: function() {
        	console.log('Component GigList created');
        	console.log(this.gigs);
        	console.log(this.images);
        }
    }
</script>