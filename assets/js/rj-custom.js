jQuery(document).ready(function($) {

    jQuery('.newsletter-carousel').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
      });

    var searchInput = $('#s');
    var suggestionsContainer = $('#search-suggestions');
    var timer;

    searchInput.on('input', function() {
        clearTimeout(timer);
        var query = $(this).val();

        if (query.length < 2) {
            suggestionsContainer.empty();
            suggestionsContainer.removeClass('show');
            return;
        }

        timer = setTimeout(function() {
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'get_search_suggestions',
                    query: query
                },
                success: function(response) {
                    if (response.success) {
                        var results = response.data;
                        var html = '';
                        
                        for (var postType in results) {
                            if (results.hasOwnProperty(postType)) {
                                html += '<h3>' + capitalizeFirstLetter(postType) + '</h3>';
                                html += '<ul>';
                                results[postType].forEach(function(result) {
                                    html += '<li>';
                                    html += '<a href="' + result.url + '">';
                                    html += '<strong>' + result.title + '</strong>';
                                    // html += '<br><small>' + result.excerpt + '</small>';
                                    html += '</a>';
                                    html += '</li>';
                                });
                                html += '</ul>';
                            }
                        }
                        
                        suggestionsContainer.html(html);
                        suggestionsContainer.addClass('show');
                    } else {
                        suggestionsContainer.html('<p>No results found</p>');
                    }
                }
            });
        }, 300);
    });

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }


    


});