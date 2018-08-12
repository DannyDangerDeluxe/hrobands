<template>
	<div class="gig-list">
		<div class="card">
			<div class="card-header">
				<h3>{{title}}</h3>
			</div>
			<div class="card-body">
				<div v-for="gig in computedGigs" class="preview margin-sm-bottom">
					<div class="data col-xs-12 col-md-9 float-left">
						<div class="name">
							<h4>{{ gig.gig.name }}</h4>
						</div>
						<div class="info margin-sm-top">
							<div class="form-group no-margin no-padding col-xs-12 col-md-6 float-left">
								{{ lang.place }}: {{ gig.gig.location }}
							</div>
							<div class="form-group no-margin no-padding col-xs-12 col-md-6 float-left">
								{{ lang.date }}: {{ gig.date }}
							</div>
							<div v-if="gig.gig.open_doors" class="form-group no-margin no-padding col-xs-12 col-md-6 float-left">
								{{ lang.openDoors }}: {{ gig.gig.open_doors }} 
							</div>
							<div v-if="gig.gig.price" class="form-group no-margin no-padding col-xs-12 col-md-6 float-left">
								{{ lang.price }}: {{ gig.gig.price }} 
							</div>
							<div v-if="gig.gig.description" class="form-group no-margin no-padding col-xs-12 col-md-12">
								{{ lang.desc }}: {{ gig.gig.description }} 
							</div>

							<div class="form-group no-margin no-padding margin-sm-right col-xs-12">
								<a :href="'/gigs/' + gig.gig.id" class="btn btn-primary margin-sm-right">{{ lang.read_more }}</a>
								<a v-if="gig.gig.link" :href="gig.gig.link" class="btn btn-primary">{{ lang.link }}</a>
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
        props: ['lang', 'title', 'gigs', 'images', 'show'],
        computed: {
        	computedGigs () {
        		switch(this.show){
        			case 'upcomming':
        				return this.futureGigs;
        				break;
        			case 'outdated':
        				return this.pastGigs;
        				break;
        			case 'all':
        			default:
        				return this.fullGigs;
        				break;
        		}
        	},
        	fullGigs () {
        		return this.gigs.map((gig, i) => {
					let tmpDate = gig.date.split('-');
					return {
						gig: gig,
						image: this.images[i],
						date: tmpDate[2] + ". " + tmpDate[1] + ". " + tmpDate[0]
					}
				})
        	},
        	futureGigs () {
				let nowDate = new Date();
				nowDate.setMinutes(0);
				nowDate.setSeconds(0);
				nowDate.setMilliseconds(0);

        		let result = this.gigs.filter((gig, i) => {
        			let tmpDate = gig.date.split('-');	
					let gigDate = new Date();
					gigDate.setFullYear(tmpDate[0]);
					// month array starts at 0
					gigDate.setMonth(tmpDate[1]-1); 
					gigDate.setDate(tmpDate[2]);
					gigDate.setMinutes(0);
					gigDate.setSeconds(0);
					gigDate.setMilliseconds(0);
					
					if(gigDate >= nowDate){
						return true;
					}
				});

				return result.map((gig, i) => {
					let tmpDate = gig.date.split('-');
					return {
						gig: gig,
						image: this.images[i],
						date: tmpDate[2] + ". " + tmpDate[1] + ". " + tmpDate[0]
					}
				});
        	},
        	pastGigs () {
				let nowDate = new Date();
				nowDate.setMinutes(0);
				nowDate.setSeconds(0);
				nowDate.setMilliseconds(0);

        		let result = this.gigs.filter((gig, i) => {
        			let tmpDate = gig.date.split('-');	
					let gigDate = new Date();
					gigDate.setFullYear(tmpDate[0]);
					// month array starts at 0
					gigDate.setMonth(tmpDate[1]-1); 
					gigDate.setDate(tmpDate[2]);
					gigDate.setMinutes(0);
					gigDate.setSeconds(0);
					gigDate.setMilliseconds(0);
					
					if(gigDate < nowDate){
						return true;
					}else{
						return false;
					}
				});

				return result.map((gig, i) => {
					let tmpDate = gig.date.split('-');
					return {
						gig: gig,
						image: this.images[i],
						date: tmpDate[2] + ". " + tmpDate[1] + ". " + tmpDate[0]
					}
				});
        	},
        },
        created: function() {
        	console.log('Component GigList created');
        }
    }
</script>