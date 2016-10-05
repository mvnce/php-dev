/*! DO NOT EDIT ajaxnoir 2016-04-25 */
/**
 * Created by Vincent on 4/25/16.
 */

function Login(sel) {

    var form = $(sel);
    form.submit(function(event) {
        event.preventDefault();

        console.log("Submitted");

        $.ajax({
            url: "post/login.php",
            data: form.serialize(),
            method: "POST",
            success: function(data) {
                var json = parse_json(data);
                if(json.ok) {
                    // Login was successful
                    window.location.assign("./");
                } else {
                    // Login failed, a message is in json.message
                    $(sel + " .message").html("<p>" + json.message + "</p>");
                }
            },
            error: function(xhr, status, error) {
                // An error!
                $(sel + " .message").html("<p>Error: " + error + "</p>");
            }
        });
    });
}
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
    if(json.results[0].poster_path !== null)
    {
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
/**
 * Created by Vincent on 4/25/16.
 */

function parse_json(json) {
    try {
        var data = $.parseJSON(json);
    } catch(err) {
        throw "JSON parse error: " + json;
    }

    return data;
}
/**
 * Created by Vincent on 4/25/16.
 */

function Stars(sel) {
    var table = $(sel + " table");  // The table tag
    this.sel = sel;

    // Loop over the table rows
    var rows = table.find("tr");    // All of the table rows
    for(var r=1; r<rows.length; r++) {
        // Get a row
        var row = $(rows.get(r));

        // Determine the row ID
        var id = row.find('input[name="id"]').val();

        // Find and loop over the stars, installing a listener for each
        var stars = row.find("img");
        for(var s=0; s<stars.length; s++) {
            var star = $(stars.get(s));

            // We are at a star
            this.installListener(row, star, id, s+1);
        }
    }
}

Stars.prototype.installListener = function(row, star, id, rating) {
    var that = this;

    star.click(function() {
        $.ajax({
            url: "post/stars.php",
            data: {id: id, rating: rating},
            method: "POST",
            success: function(data) {
                var json = parse_json(data);
                if(json.ok) {
                    // Successfully updated
                    $(".table").html(json.table);
                    that.update(row, rating);
                    new Stars("form");
                    that.message("<p>Successfully updated</p>");

                } else {
                    // Update failed
                    that.message("<p>Update failed</p>");

                }
            },
            error: function(xhr, status, error) {
                // Error
                that.message("<p>Error: " + error + "</p>");
            }
        });
    });
};


Stars.prototype.update = function(row, rating) {

    // Loop over the stars, setting the correct image
    var stars = row.find("img");
    for(var s=0; s<stars.length; s++) {
        var star = $(stars.get(s));

        if(s < rating) {
            star.attr("src", "images/star-green.png")
        } else {
            star.attr("src", "images/star-gray.png");
        }
    }

    var num = row.find("span.num");
    num.text("" + rating + "/10");
};

Stars.prototype.message = function(message) {
    var that = this;

    $(this.sel + " .message").html(message);
    $(this.sel + " .message").show();

    setTimeout(function() {
        $(that.sel + " .message").fadeOut(1000);
    }, 2000);
};
