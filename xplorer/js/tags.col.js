(function ( collections , pagination , model ) {
	collections.Tags = Backbone.Collection.extend({
		model : model,

		/*by using the &callback=? option, Backbone will switch to JSONP for us*/
		//url: 'http://search.twitter.com/search.json?q=' + pagination.queryParams.query + '&rpp=' + pagination.queryParams.perPage + ' &include_entities=true&result_type=recent&callback=?',
		url :'http://localhost/forkan/api/?rmz=28e336ac6c9423d946ba02d19c6a2632&ver=1.0&byn=%7B%22cls%22%3A%22Forkan%22%2C%22act%22%3A%22read%22%2C%22ayaID%22%3A1%7D',
		parse : function ( response ) {
			var tags = response.results;

			/*
			uncomment if you wish to return the total
			number of available results that are available

			this.queryTotalPages = resonse.totalPages;
			*/

			return tags;
		}
	});

	_.extend(collections.Tags.prototype, pagination);
})( App.collections, App.mixins.Paginator, App.models.Tag );

