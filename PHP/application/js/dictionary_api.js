
/*
fetch('https://random-words-api.vercel.app/word')
.then((res) => res.json())
.then(output => {
  var data = output;
  var word = (data[0].word)
  //console.log(word)


})
*/
function loop_definitons(v) {
  var values = []
  Object.entries(v).forEach(items => {
    values.push(items[1].definition)
    //document.getElementById("definition").innerHTML +='<strong>' + a + '</strong>' + ': ' + delta + '<br>';

  })
  // if there are too many definitions, reduce them down to a total of 4
  if (values.length > 5){
    for(var i = values.length-1;i>=0;i--){
      values.splice(Math.floor(Math.random()*values.length), 1);

      if (values.length < 5){
        break
      }
    }
  }
  return values.join('<li>')
}

function StringCheck(word) {
  value = []
  for (let i=0; i<word.length; i++) {
    value.push(word.charAt(i))
  }
  return value
}

function WordCheckFunction(guessed, actual){ //more like word comparison checker, but harder
  var x = StringCheck(guessed)
  var y = StringCheck(actual)
  var right_counter = []
  var wrong_counter = []
  var notincluded_counter = []
  for (let i=0; i<x.length; i++) { //check the right characters in the list
    if (y.includes(x[i]) === true) {
      if (right_counter.includes(x[i])) {
        continue // if the word is already included in the list, skip it
      } 
      else {
        right_counter.push(x[i]); //if not, add it
      }
    } 
    else if (y.includes(x[i]) === false) {
      wrong_counter.push(i) // if there are characters that are not in the list
    }
  }
  // check for if a character is not guessed
  for (let i=0; i<y.length; i++) {
    if (right_counter.includes(y[i]) === false) {
      notincluded_counter.push(y[i])
    }
    else if (notincluded_counter.includes(y[i]) === true) {
      console.log('some kind of error has been detected, please let me know if this error occured')
    }
  }

  if (wrong_counter.length != 0) { // if there are wrong letters guessed
    document.getElementById('a-hinter-w').classList.remove("hidden");
    document.getElementById('a-hinter-w').innerHTML = (wrong_counter.length + " wrong letter(s) guessed")
  } else { // if no wrong letters are guessed
    document.getElementById('a-hinter-r').classList.remove("hidden");
    document.getElementById('a-hinter-r').innerHTML = "all of the letter(s) you guessed contain in the word"
    var conditionWord = true
  }

  if (notincluded_counter.length > 0) {
    document.getElementById('a-hinter-w').classList.remove("hidden");
    document.getElementById('a-hinter-w').innerHTML = ("some of the letters are not guessed")
  }
  right_counter = []
  wrong_counter = []
  
  for (let p=0; p<x.length; p++) {
    if (x[p] === y[p]) {
      right_counter.push(x[p])
    }
    else {
      wrong_counter.push(x[p])
    }
  }
  //console.log(right_counter.length + " right positioned letters")
  if (right_counter.length != 0 & conditionWord != true) {
    document.getElementById('p-hinter-r').classList.remove("hidden");
    document.getElementById('p-hinter-r').innerHTML = (right_counter.length + " of the letter(s) gussed are in the right position")
    //console.log(wrong_counter.length + " wrong positioned letters")
    document.getElementById('p-hinter-w').classList.remove("hidden");
    document.getElementById('p-hinter-w').innerHTML = (wrong_counter.length + " of the letter(s) gussed are wrong and in the wrong position")
  }
  else if (conditionWord === true) {
    document.getElementById('p-hinter-w').classList.remove("hidden");
    document.getElementById('p-hinter-w').innerHTML = (wrong_counter.length + " of the letter(s) gussed are in the wrong position")
  }

  else {
    document.getElementById('p-hinter-w').classList.remove("hidden");
    document.getElementById('p-hinter-w').innerHTML = "all of the characters guessed are in the wrong position"
  }
}

function WordCheckerEasyFunction(guessed, actual){
  var x = StringCheck(guessed)
  var y = StringCheck(actual)
  var right_counter = []
  var wrong_counter = []
  var notincluded_counter = []
  for (let i=0; i<x.length; i++) { //check the right characters in the list
    if (y.includes(x[i]) === true) {
      if (right_counter.includes(x[i])) {
        continue // if the word is already included in the list, skip it
      } 
      else {
        right_counter.push(x[i]); //if not, add it
      }
    } 
    else if (y.includes(x[i]) === false) {
      wrong_counter.push(x[i]) // if there are characters that are not in the list
    }
  }
  // check for if a character is not guessed
  for (let i=0; i<y.length; i++) {
    if (right_counter.includes(y[i]) === false) {
      notincluded_counter.push(y[i])
    }
    else if (notincluded_counter.includes(y[i]) === true) {
      console.log('some kind of error has been detected, please let me know if this error occured')
    }
  }

  if (wrong_counter.length != 0) { // if there are wrong letters guessed
    document.getElementById('a-hinter-w').classList.remove("hidden");
    document.getElementById('a-hinter-w').innerHTML = (wrong_counter.length + " wrong letter(s) guessed")
    document.getElementById('a-hinter-r').classList.remove("hidden");
    document.getElementById('a-hinter-r').innerHTML = "correct letter(s) guessed are: <strong class='uppercase'>" + right_counter + "</strong>"
  } else { // if no wrong letters are guessed
    document.getElementById('a-hinter-r').classList.remove("hidden");
    document.getElementById('a-hinter-r').innerHTML = "all of the letter(s) you guessed contain in the word"
    var conditionWord = true
  }

  if (notincluded_counter.length > 0) {
    document.getElementById('a-hinter-w').classList.remove("hidden");
    document.getElementById('a-hinter-w').innerHTML = (notincluded_counter.length + " of the letters are not guessed")
  }
  // reset list
  right_counter = []
  wrong_counter = []
  
  for (let p=0; p<x.length; p++) {
    if (x[p] === y[p]) {
      right_counter.push(x[p])
    }
    else {
      wrong_counter.push(x[p])
    }
  }
  //console.log(right_counter.length + " right positioned letters")
  if (right_counter.length != 0 & conditionWord != true) {
    document.getElementById('p-hinter-r').classList.remove("hidden");
    document.getElementById('p-hinter-r').innerHTML = (right_counter.length + " of the letter(s) gussed are in the right position")
    //console.log(wrong_counter.length + " wrong positioned letters")
    document.getElementById('p-hinter-w').classList.remove("hidden");
    document.getElementById('p-hinter-w').innerHTML = (wrong_counter.length + " of the letter(s) gussed are wrong and in the wrong position")
  }
  else if (conditionWord === true) {
    document.getElementById('p-hinter-w').classList.remove("hidden");
    document.getElementById('p-hinter-w').innerHTML = (wrong_counter.length + " of the letter(s) gussed are in the wrong position")
  }

  else {
    document.getElementById('p-hinter-w').classList.remove("hidden");
    document.getElementById('p-hinter-w').innerHTML = "all of the characters guessed are in the wrong position"
  }
}

// harder word checker
function WordChecker(){
  const val = document.querySelector('input').value.toLowerCase();
  const word = document.querySelector('strong').textContent.toLowerCase();
  // hide all elements on load
  document.getElementById('l-hinter-w').classList.add("hidden")
  document.getElementById('a-hinter-w').classList.add("hidden")
  document.getElementById('p-hinter-w').classList.add("hidden")
  document.getElementById('l-hinter-r').classList.add("hidden")
  document.getElementById('a-hinter-r').classList.add("hidden")
  document.getElementById('p-hinter-r').classList.add("hidden")
  
  // if the word is correct
  if(val === word){
    alert("You win")
  }
  else{
    if(val.length != word.length) {
      WordCheckerEasyFunction(val, word)
      document.getElementById('l-hinter-w').classList.remove("hidden");
      document.getElementById('l-hinter-w').innerHTML = 'Length of the word you guessed is not equal to the actual word'
      // check if the guessed word contain the letters of the actual word
    } 
    else {
      WordCheckerEasyFunction(val, word)
      document.getElementById('l-hinter-r').classList.remove("hidden");
      document.getElementById('l-hinter-r').innerHTML = 'Length of the word you guessed is correct (' + val.length + ' letters)'
    }
  }
}

// easier word checker (changes are still required)
function WordCheckerEasy () {
  const val = document.querySelector('input').value.toLowerCase();
  const word = document.querySelector('strong').textContent.toLowerCase();
  // hide all elements on load
  document.getElementById('l-hinter-w').classList.add("hidden")
  document.getElementById('a-hinter-w').classList.add("hidden")
  document.getElementById('p-hinter-w').classList.add("hidden")
  document.getElementById('l-hinter-r').classList.add("hidden")
  document.getElementById('a-hinter-r').classList.add("hidden")
  document.getElementById('p-hinter-r').classList.add("hidden")
   // if the word is correct
   if(val === word){
    alert("You win");
    window.location.reload();
    return false
  }
  else{
    if(val.length != word.length) {
      //WordCheckFunction(val, word)
      document.getElementById('l-hinter-w').classList.remove("hidden");
      document.getElementById('l-hinter-w').innerHTML = 'Length of the word you guessed is not equal to the actual word'
      // check if the guessed word contain the letters of the actual word
    } 
    else {
      //WordCheckFunction(val, word)
      document.getElementById('l-hinter-r').classList.remove("hidden");
      document.getElementById('l-hinter-r').innerHTML = 'Length of the word you guessed is correct (' + val.length + ' letters)'
    }
  }
}

function EasyWordGeneator(){
  fetch('./js/common-words.json')
  .then((res) => res.json())
  .then(output => {
    var data = output.commonWords;
    const random = data[Math.floor(Math.random() * data.length)];


    fetch('https://api.dictionaryapi.dev/api/v2/entries/en/' + random)
    .then(function (response){
      if (response.status === 404) {
        console.warn('404 error')
        //alert('Word did not found in dictionary, please refresh page')
        document.getElementById('definition').innerHTML="Error: Please refresh page"
        window.location.reload()
      
      }
      else {
        return response
      }
    })
    .then((res) => res.json())
    .then(output => {
      var data = output;
      delete data[0].license
      delete data[0].phonetics
      console.log(data) // get the randomly generated word
      // console.log(Object.prototype.toString.call(x));

      // get the word 
      var words = (data[0].word)
      console.log(words)
      document.getElementById("main-word").innerHTML += 'Word: <strong>' + words + '</strong><br>'

      // ****************** if only length of 1
      if (data.length < 2) {
        // a loop to get the part of speech and definitons
        var x = (data[0].meanings)
        randomMath = Math.trunc(Math.random() * x.length) //purpose is for random selecting a random definition 
      
        // pick all definition
        Object.entries(x).forEach(item => {
          //console.log(item[1])
          a = (item[1].partOfSpeech)
          b = (item[1].definitions)
          //b = (item[1].definitions[0].definition)

          y = loop_definitons(b)
          document.getElementById("definition").innerHTML +='<br><strong>' + a + '</strong>' + ': <ul class="list-disc"><li>' + y + '<br>';
        })
      
        /* 
        // pick only 1 definition
        a = (x[randomMath].partOfSpeech)
        randomDef = Math.trunc(Math.random() * x[randomMath].definitions.length)
        b = (x[randomMath].definitions[randomDef].definition)
        document.getElementById("definition").innerHTML +='<strong>' + a + '</strong>' + ': ' + b + '<br>';
      */
      
      }
      // ******************* if the length is more than 1 
      else {
        Object.entries(data).map(item => {
          var p = item[1].meanings
          //console.log("p data length is: " + p.length)
          Object.entries(p).forEach(item => {
            x = (item[1].definitions)
            a = (item[1].partOfSpeech)
            document.getElementById("definition").innerHTML +='<strong>' + a + '</strong>' + ': ' + x[0].definition+ '<br>';

          })
        })
      }

        // end of api dictionary
    })
      // end of random word generator via json
  })
}

// get the word, reset elements within loaded in the previous quiz
window.onload = EasyWordGeneator()
element = document.querySelectorAll("strong");
window.onload = Array.prototype.forEach.call( element, function( node ) {
  node.parentNode.removeChild( node );
});

window.onload = document.getElementById('definition').innerHTML=""
window.onload = document.getElementById('p-hinter-w').innerHTML=""
window.onload = document.getElementById('p-hinter-r').innerHTML=""
window.onload = document.getElementById('a-hinter-w').innerHTML=""
window.onload = document.getElementById('a-hinter-r').innerHTML=""
window.onload = document.getElementById('l-hinter-w').innerHTML=""
window.onload = document.getElementById('l-hinter-r').innerHTML=""
