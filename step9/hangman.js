/**
 * Created by Vincent on 4/8/16.
 */

function randomWord() {
    var words = ["moon","home","mega","blue","send","frog","book","hair","late",
        "club","bold","lion","sand","pong","army","baby","baby","bank","bird","bomb","book",
        "boss","bowl","cave","desk","drum","dung","ears","eyes","film","fire","foot","fork",
        "game","gate","girl","hose","junk","maze","meat","milk","mist","nail","navy","ring",
        "rock","roof","room","rope","salt","ship","shop","star","worm","zone","cloud",
        "water","chair","cords","final","uncle","tight","hydro","evily","gamer","juice",
        "table","media","world","magic","crust","toast","adult","album","apple",
        "bible","bible","brain","chair","chief","child","clock","clown","comet","cycle",
        "dress","drill","drink","earth","fruit","horse","knife","mouth","onion","pants",
        "plane","radar","rifle","robot","shoes","slave","snail","solid","spice","spoon",
        "sword","table","teeth","tiger","torch","train","water","woman","money","zebra",
        "pencil","school","hammer","window","banana","softly","bottle","tomato","prison",
        "loudly","guitar","soccer","racket","flying","smooth","purple","hunter","forest",
        "banana","bottle","bridge","button","carpet","carrot","chisel","church","church",
        "circle","circus","circus","coffee","eraser","family","finger","flower","fungus",
        "garden","gloves","grapes","guitar","hammer","insect","liquid","magnet","meteor",
        "needle","pebble","pepper","pillow","planet","pocket","potato","prison","record",
        "rocket","saddle","school","shower","sphere","spiral","square","toilet","tongue",
        "tunnel","vacuum","weapon","window","sausage","blubber","network","walking","musical",
        "penguin","teacher","website","awesome","attatch","zooming","falling","moniter",
        "captain","bonding","shaving","desktop","flipper","monster","comment","element",
        "airport","balloon","bathtub","compass","crystal","diamond","feather","freeway",
        "highway","kitchen","library","monster","perfume","printer","pyramid","rainbow",
        "stomach","torpedo","vampire","vulture"];

    return words[Math.floor(Math.random() * words.length)];
}

function game() {
    // initial setup
    var play_Area = document.getElementById('play-area');
    var rWord = randomWord();
    var letters = '';
    console.log(rWord);

    for (var i = 0; i < rWord.length; i++) {
        letters += '_';
    }

    var html = '<p><img id="hangman-img" src="images/hm0.png" alt="hangman-img"></p>';
    html += '<p id="letters">';
    for (var j = 0; j < letters.length; j++) {
        html += letters[j];
        html += ' ';
    }
    html += '</p>';
    html += '<form>' +
        '<input type="hidden" id="word" value="'+rWord+'">' +
        '<p><label for="letter">Letter: </label><input type="text" id="letter"></p>' +
        '<p><input type="submit" id="guess-submit" value="Guess!"> <input type="submit" id="new-game-submit" value="New Game"></p>' +
        '<p id="result">&nbsp;</p>' +
        '</form>';
    play_Area.innerHTML = html;


    // game starts
    var winFlag = false;
    var gameFlag = true;
    var imgCnt = 0;

    document.getElementById('new-game-submit').onclick = function(event) {
        event.preventDefault();

        winFlag = false;
        gameFlag = true;
        imgCnt = 0;
        rWord = randomWord();
        letters = '';
        for (var i = 0; i < rWord.length; i++) {
            letters += '_';
        }

        var emptyLetters = '';
        for (var j = 0; j < letters.length; j++) {
            emptyLetters += letters[j];
            emptyLetters += ' ';
        }
        document.getElementById('hangman-img').src = 'images/hm0.png';
        document.getElementById('letters').innerHTML = emptyLetters;
        document.getElementById('result').innerHTML = '&nbsp;';
        document.getElementById('word').value = rWord;

        console.log(rWord);
    };

    document.getElementById('guess-submit').onclick = function(event) {
        event.preventDefault();

        var letter = document.getElementById('letter');
        var result = document.getElementById('result');

        if (gameFlag) {
            result.innerHTML = '';

            if(letter.value == '' || letter.value == null) {
                result.innerHTML = 'You must enter a letter!';
            }
            else if(letter.value.length > 1) {
                result.innerHTML = 'Only one letter!';
            }
            else {
                var pos_arr = [];
                for (var i = 0; i < rWord.length; i++) {
                    if (rWord.charAt(i) == letter.value) {
                        console.log('found same: ' + letter.value);
                        pos_arr.push(i);
                    }
                }

                if (pos_arr.length == 0 && imgCnt < 6) {
                    imgCnt += 1;
                    document.getElementById('hangman-img').src = 'images/hm'+ imgCnt +'.png';

                    if (imgCnt == 6) {
                        document.getElementById('result').innerHTML = 'You guessed poorly!';
                        gameFlag = false;
                        winFlag = false;

                        var fullLetters = '';
                        for (var m = 0; m < rWord.length; m++) {
                            fullLetters += rWord[m];
                            fullLetters += ' ';
                        }
                        document.getElementById('letters').innerHTML = fullLetters;
                    }

                }
                else {
                    var new_letters = '';
                    for (var j = 0; j < letters.length; j++) {
                        if (pos_arr.indexOf(j) != -1) {
                            new_letters += rWord[j];
                        } else {
                            new_letters += letters[j];
                        }
                    }
                    letters = new_letters;

                    var outHTML = '';
                    for (var k = 0; k < letters.length; k++) {
                        outHTML += letters[k] + ' ';
                    }
                    document.getElementById('letters').innerHTML = outHTML;
                    console.log(letters);

                    // check word completion
                    var checkFlag = true;
                    for (var l = 0; l < letters.length; l++) {
                        if (letters.charAt(l) == '_') {
                            checkFlag = false;
                        }
                    }
                    if (checkFlag) {
                        document.getElementById('result').innerHTML = 'You win!';
                        gameFlag = false;
                        winFlag = true;
                    }

                }
            }
        }

        document.getElementById('letter').value = '';
    }



}
