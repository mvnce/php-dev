/**
 * Created by Vincent on 4/25/16.
 */

function MovieInfo(sel, title, year) {
    var that = this;
    this.sel = sel;

    $.ajax({
        url: "https://api.themoviedb.org/3/search/movie",
        data: {api_key: "76799216f240ce4f7346b1b47274323c", query: title, year: year},
        method: "GET",
        dataType: "text",
        success: function(data) {
            var json = parse_json(data);
            if(json.total_results == 0) {
                $(that.sel).html("<p>No information available</p>");
            }
            else {
                that.addInfo(json);
            }
        },
        error: function(xhr, status, error) {
            $(that.sel).html('<p>Unable to communicate<br>with themoviedb.org</p>');
        }
    })
}

MovieInfo.prototype.addInfo = function(json) {
    var div = $(this.sel);
    var poster = 'http://image.tmdb.org/t/p/w500/'+json.results[0].poster_path;

    var html = "<ul>";
    html += '<li><a href=""><img src="images/info.png"></a>';
    html += '<div><p>Title: ' + json.results[0].title + '</p>';
    html += '<p>Release Date: ' + json.results[0].release_date + '</p>';
    html += '<p>Vote average: ' + json.results[0].vote_average + '</p>';
    html += '<p>Vote count: ' + json.results[0].vote_count + '</p>';
    html += '</div></li>';

    html += '<li><a href=""><img src="images/plot.png"></a>';
    html += '<div>';
    html += '<p>'+ json.results[0].overview +'</p></div></li>';
    if(json.results[0].poster_path !== null) {
        html += '<li><a href=""><img src="images/poster.png"></a>';
        html += '<div>';
        html += '<p class="poster"><img src="' + poster + '">';
        html += '</p></div>';
        html += '</li>';
    }

    html += "</ul>";

    div.html(html);

    var rows = div.find("a");
    for(var r=0; r<rows.length; r++) {
        var row = $(rows.get(r));
        this.installListener(row, r);
    }
    this.showInfo(0);
};


MovieInfo.prototype.installListener = function(row, id) {
    var that = this;

    row.click(function(event) {
        event.preventDefault();
        that.showInfo(id);
    });
};

MovieInfo.prototype.showInfo = function(id) {
    var rs = $(this.sel).find("li");
    for(var r=0; r<rs.length; r++) {
        var rw = $(rs.get(r));
        if (r == id) {
            rw.find("a").css("opacity", '1.0');
            rw.find("div").fadeIn(1000);

        }
        else {
            rw.find("a").css("opacity", '0.3');
            rw.find("div").fadeOut(1000);
        }
    }
};