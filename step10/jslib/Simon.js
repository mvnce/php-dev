/**
 * Created by Vincent on 4/18/16.
 */

function Simon(sel) {

    this.state = "initial";
    this.sequence = [];
    this.sequence.push(Math.floor(Math.random() * 4));
    this.current = 0;

    // Get a reference to the form object
    this.form = $(sel);
    this.configureButton(0, "red");
    this.configureButton(1, "green");
    this.configureButton(2, "blue");
    this.configureButton(3, "yellow");

    this.play();
}

Simon.prototype.configureButton = function(ndx, color) {
    var button = $(this.form.find("input").get(ndx));
    var that = this;

    button.click(function(event) {

    });

    button.mousedown(function(event) {
        button.css("background-color", color);
    });

    button.mouseup(function(event) {
        button.css("background-color", "lightgrey");
    });

    button.click(function(event) {
        if (that.state == 'entered') {
            document.getElementById(color).currentTime = 0;
            document.getElementById(color).play();
            that.buttonPress(this, color, ndx);
        }
    });
};

Simon.prototype.play = function() {
    this.state = "play";    // State is now playing
    this.current = 0;       // Starting with the first one
    this.playCurrent();
};

Simon.prototype.playCurrent = function() {
    var that = this;

    $(this.form.find("input").get(0)).css("background-color", "lightgrey");
    $(this.form.find("input").get(1)).css("background-color", "lightgrey");
    $(this.form.find("input").get(2)).css("background-color", "lightgrey");
    $(this.form.find("input").get(3)).css("background-color", "lightgrey");

    if(this.current < this.sequence.length) {
        // We have one to play
        var colors = ['red', 'green', 'blue', 'yellow'];
        document.getElementById(colors[this.sequence[this.current]]).play();
        that.buttonOn(this.sequence[this.current]);
        this.current++;

        window.setTimeout(function() {
            that.playCurrent();
        }, 1000);
    } else {
        that.current = 0;
        that.state = 'entered';
    }
};

Simon.prototype.buttonOn = function(button) {
    var color = null;
    if (button == 0) {
        color = 'red';
    }
    else if (button == 1) {
        color = 'green';
    }
    else if (button == 2) {
        color = 'blue';
    }
    else if (button == 3) {
        color = 'yellow';
    }

    $(this.form.find("input").get(button)).css("background-color", color);
};

Simon.prototype.buttonPress = function(button, color, ndx) {
    var that = this;

    if(that.sequence[that.current] == ndx){
        if(that.current == that.sequence.length-1) {
            that.sequence.push(Math.floor(Math.random() * 4));
            window.setTimeout(function() {
                that.play();
            }, 2000);
        }else{
            that.current++;
        }
    }else{
        document.getElementById("buzzer").play();
        that.state = "initial";
        that.sequence.length = 0;
        that.sequence.push(Math.floor(Math.random() * 4));
        window.setTimeout(function() {
            that.play();
        }, 2000);
    }
};